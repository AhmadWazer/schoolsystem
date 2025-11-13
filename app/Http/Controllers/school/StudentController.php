<?php

namespace App\Http\Controllers\school;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;
use App\Models\User;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\Parents;
use App\Models\DateSheet;
use App\Models\Attendance;

class StudentController extends Controller
{
    public function student()
    {
        $data = User::where('role','=','student')->get();
        $std = Classes::get();
        return view('school.student')->with('data',$data)->with('std',$std);
    }
    
    public function stdatten(Request $request)
    {
        $class_id = $request->class_id;
        $value = User::get()->where('role','student')->where('student_class',$class_id);

        return response()->json($value);
    }
    public function classDetails(Request $request)
    {
        $class_id = $request->input('class_id');

        // Assuming you have a 'c_name' column in the 'classes' table
        $classDetails = Classes::select('c_name')->find($class_id);

        return response()->json($classDetails);
    }
    public function addeditstudent()
    {
        $pdata = User::where('role','=','parant')->get();
        $cdata = Classes::get(); 
        return view('school.addedit_student')->with('pdata',$pdata)->with('cdata',$cdata);
    }
    public function show($id)
    {
        $show = User::findOrFail($id);
        return view('school.showstudent')->with('show', $show);
    }
    public function store(Request $request)
    {
        $std = new User;
        $std->name = $request->sname;
        $std->email = $request->semail;
        $std->password = $request->password;
        $std->roll_number = $request->roll_number;
        $std->phone = $request->phone;
        $std->gender = $request->btnradio;
        $std->dob = $request->dob;
        $std->current_address = $request->currentadd;
        $std->permenent_address = $request->paddress;
        $std->assign_class = $request->assign_class;
        $std->student_parent = $request->student_parent;
        $std->image = $request->picture;
        $std->save();

        return redirect('/student');
    }
    public function edit($id)
    {
        $pdata = User::where('role','=','parant')->get();
        $cdata = Classes::get();
        $stdata = User::findOrFail($id);

        return view('school.addedit_student')->with('stdata',$stdata)->with('pdata',$pdata)->with('cdata',$cdata);
    }
    public function update(Request $request, $id)
    {
        $std = User::findOrFail($id);
        $std->name = $request->sname;
        $std->email = $request->semail;
        $std->password = $request->password;
        $std->roll_number = $request->roll_number;
        $std->phone = $request->phone;
        $std->gender = $request->btnradio;
        $std->dob = $request->dob;
        $std->current_address = $request->currentadd;
        $std->permenent_address = $request->paddress;
        $std->student_class = $request->assign_class;
        $std->student_parent = $request->student_parent;
        $std->image = $request->picture;
        $std->save();

        return redirect('/student');
    }
    public function delete($id)
    {
        User::destroy($id);
        return Redirect()->route("student");
    }
    public function datesheet()
    {
        $id = Auth::user()->student_class;
        $dsheet = DateSheet::select('*','c_name','s_name','name')
        ->join('classes','classes.id','=','date_sheets.class_id')
        ->join('subjects','subjects.id','=','date_sheets.subject_id')
        ->join('users','users.id','=','date_sheets.teacher_id')
        ->where('class_id',$id)->get();
        $ldate = new DateTime('now');
        // dd($dsheet);
        return view('school.shownotification')->with('dsheet',$dsheet)->with('ldate',$ldate);
    }
    public function showattend()
    {
        $subjectName = subject::get();
        $id = Auth::user()->id;
        $attendance = Attendance::with(['class', 'subject', 'teacher'])
        ->where('student_id', $id)
        ->get();
        $student = User::find($id);

        return view('Attendance.studentAttendShow', compact('attendance', 'student','subjectName'));
    }
        public function showStudentAttend(Request $request)
    {
        $id = Auth::user()->id;
        $data = $request->selectedSubject;

        $subject = Attendance::where('subject_id',$data)->where('student_id', $id)->get();
        foreach ($subject as $searchSub) {
            // Fetch student name
            $student = User::where('id', $searchSub->student_id)->first();
            $searchSub->student_name = $student->name;
            // Fetch teacher name
            $teacher = User::where('id', $searchSub->teacher_id)->first();
            $searchSub->teacher_name = $teacher->name;
            // get class name
            $classes = Classes::where('id', $searchSub->class_id)->first();
            $searchSub->class_name = $classes->c_name;
            // get subject name
            $subjects = Subject::where('id', $searchSub->subject_id)->first();
            $searchSub->subject_name = $subjects->s_name;
        }

     return response()->json($subject);
    }
}
