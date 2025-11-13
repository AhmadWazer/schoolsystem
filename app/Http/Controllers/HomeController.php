<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Classes;
use App\Models\Attendance;
use App\Models\Subject;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
            $pendingCount = User::where('status', 'pending')->count();//count pending status in icon
        $show = User::where('role', '=', 'student')->get();
        $teach = User::where('role', '=', 'teacher')->get();
        $parent = User::where('role', '=', 'parent')->get();
        $sub = Subject::get();
        $class = Classes::get();
        return view('home')->with('show',$show)->with('teach',$teach)->with('parent',$parent)
        ->with('sub',$sub)->with('class',$class)->with('pendingCount', $pendingCount);
    }
    public function pending()
    {
        return view('pending');
    }
    public function studentAtten($id)
    {
        $value = Classes::findOrFail($id);
    
        return view('school.studentAttendance')->with('value',$value);
    }

    // depulication check and save attendance

public function save(Request $request)
{
    // Validate the request (optional but recommended)
    $request->validate([
        'class' => 'required',
        'subject' => 'required',
        'date' => 'required|date',
        'teacherId' => 'required',
        'attend' => 'required|array',
    ]);

    // Check if attendance for this class, subject, and date already exists
    $exists = Attendance::where('class_id', $request->class)
        ->where('subject_id', $request->subject)
        ->where('attend_date', $request->date)
        ->exists();

    if ($exists) {
        // If already exists, return with message
        return back()->with('error', 'Attendance for this Class and Date already exists!');
    }

    // Otherwise, insert new attendance records
    foreach ($request->attend as $studentId => $attendanceValue) {
        Attendance::insert([
            'student_id'  => $studentId,
            'class_id'    => $request->class,
            'subject_id'  => $request->subject,
            'attend'      => $attendanceValue,
            'attend_date' => $request->date,
            'teacher_id'  => $request->teacherId,
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);
    }

    return back()->with('success', 'Attendance saved successfully!');
}


    // depulication check
    public function stdData(Request $request)
    {
        $studentId = $request->studentId;
        $parentId = $request->parentId;
        $student = User::where('id',$studentId)->get();
        foreach ($student as $data) {
            // Fetch student name
            $classData = Classes::where('id', $data->student_class)->first();
            $data->class_name = $classData->c_name;
    
            // Fetch teacher name
            $parent = User::where('id', $data->student_parent)->first();
            $data->parent_name = $parent->name;
        }
        return response()->json($student);
    }
    // show Attendance in Parent page
    public function studAttendancesssssss(Request $request)
    {
        $attend = $request->attend;
        $attendanceData = Attendance::where('student_id',$attend)->get();
        foreach($attendanceData as $value){
            // class name
            $classData = Classes::where('id', $value->class_id)->first();
            $value->class_name = $classData->c_name;
            // get subject name
            $subjectData = Subject::where('id', $value->subject_id)->first();
            $value->subject_name = $subjectData->s_name;
            // teacher name
            $teacherData = User::where('id',$value->teacher_id)->first();
            $value->teacher_name = $teacherData->name;
        }

        return response()->json($attendanceData);
    }
    // show Attendance in teacher page

    public function studAttendance(Request $request)
    {
    $month = $request->month;
    $year = $request->year;
    $classId = $request->class_id;

    // Get students of the selected class
    $students = User::where('role', 'student')
                    ->where('student_class',$classId) // if assign_class is comma-separated
                    ->get();
    $result = [];

    foreach ($students as $student) {
        $attendances = Attendance::where('student_id', $student->id)
            ->whereYear('attend_date', $year)
            ->whereMonth('attend_date', $month)
            ->get();

        $attendanceMap = [];
        foreach ($attendances as $att) {
            $attendanceMap[$att->attend_date] = $att->attend;
        }

        $result[] = [
            'name' => $student->name,
            'attendance' => $attendanceMap
        ];
    }

    return response()->json($result);
    }
}
