<?php

namespace App\Http\Controllers\school;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\User;
use DB;

class SubjectController extends Controller
{
    public function subject()
    {
        // $value = Subject::get();    
        $value = Subject::with('teacher')->get();
        $teachers = User::where('role', '=', 'teacher')->get();
        return view('school.subject', compact('value', 'teachers'));
           
        // return view('school.subject')->with('value',$value);
    }
    public function addeditsubject()
    {
        $teachers = User::where('role', '=', 'teacher')->get();
        return view('school.addeditsubject', compact('teachers'));
        // return view('school.addeditsubject');
    }
    public function store(Request $request)
    {
        $sdata = new Subject;
        $sdata->s_name = $request->s_name;
        $sdata->s_code = $request->s_code;
        $sdata->s_description = $request->s_description;
        $sdata->assign_teacher = $request->assign_teacher;
        $sdata->save();
        return redirect('subject');
    }
    public function edit($id)
    {
        $teachers = User::where('role', '=', 'teacher')->get();
        $sdata = Subject::findOrFail($id);
        $teach = User::where('id', $sdata->assign_teacher)->first();
        $sdata->teacher_name = $teach ? $teach->name : 'No Teacher Assigned';

        return view('school.addeditsubject')->with('sdata',$sdata)->with('teachers',$teachers);
    }
    public function update(Request $request, $id)
    {
        
        $sdata = Subject::findOrFail($id);
        $sdata->s_name = $request->s_name;
        $sdata->s_code = $request->s_code;
        $sdata->s_description = $request->s_description;
        $sdata->assign_teacher = $request->assign_teacher;
        $sdata->save();
        return redirect('subject');
    }
    public function delete($id)
    {
        Subject::destroy($id);
        
        return redirect('subject'); 
    }
}
