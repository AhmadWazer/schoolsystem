<?php

namespace App\Http\Controllers\school;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Attendance;
use DB;

class AttendanceController extends Controller
{
    public function attendance()
    {
        return view('school.attendance');
    }
    public function attendanceShow(Request $request)
    {
        // search by class
        $selectedClass = $request->selectedClass;
        $attend = DB::table('attendance')->where('class_id',$selectedClass)->get();
        foreach ($attend as $attendance) {
            // Fetch student name
            $student = DB::table('users')->where('id', $attendance->student_id)->first();
            $attendance->student_name = $student->name;
            // Fetch teacher name
            $teacher = DB::table('users')->where('id', $attendance->teacher_id)->first();
            $attendance->teacher_name = $teacher->name;
            // get class name
            $classes = DB::table('classes')->where('id', $attendance->class_id)->first();
            $attendance->class_name = $classes->c_name;
            // get subject name
            $subjects = DB::table('subjects')->where('id', $attendance->subject_id)->first();
            $attendance->subject_name = $subjects->s_name;

        }
        return response()->json($attend);
    }
    public function subAttend(Request $request)
    {
        // search by subject
        $selectedSubject = $request->selectedSubject;
        $subject = DB::table('attendance')->where('subject_id',$selectedSubject)->get();
        foreach ($subject as $attendance) {
            // Fetch student name
            $student = DB::table('users')->where('id', $attendance->student_id)->first();
            $attendance->student_name = $student->name;
    
            // Fetch teacher name
            $teacher = DB::table('users')->where('id', $attendance->teacher_id)->first();
            $attendance->teacher_name = $teacher->name;
            // get class name
            $classes = DB::table('classes')->where('id', $attendance->class_id)->first();
            $attendance->class_name = $classes->c_name;
            // get subject name
            $subjects = DB::table('subjects')->where('id', $attendance->subject_id)->first();
            $attendance->subject_name = $subjects->s_name;
        }
        return response()->json($subject);
    }
    public function searchattend(Request $request)
    {
        // search attendance
        $selectedDate = $request->selectedDate;
        $selectedClass = $request->selectedClass;
        $selectedSubject = $request->selectedSubject;
        $date = DB::table('attendance')->where('attend_date',$selectedDate)
        ->where('class_id',$selectedClass)->where('subject_id', $selectedSubject)->get();
        foreach ($date as $attendance) {
            // get student name
            $student = DB::table('users')->where('id', $attendance->student_id)->first();
            $attendance->student_name = $student->name;
            // get teacher name
            $teacher = DB::table('users')->where('id', $attendance->teacher_id)->first();
            $attendance->teacher_name = $teacher->name;
            // get class name
            $classes = DB::table('classes')->where('id', $attendance->class_id)->first();
            $attendance->class_name = $classes->c_name;
            // get subject name
            $subjects = DB::table('subjects')->where('id', $attendance->subject_id)->first();
            $attendance->subject_name = $subjects->s_name;
        }
        return response()->json($date);

    }
}
