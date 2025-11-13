<?php

namespace App\Http\Controllers\school;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use DB;

class ClassController extends Controller
{
    public function class()
    { 
        $classes = Classes::get();
        $teachers = User::where('role', '=', 'teacher')->get();

        return view('school.class', compact('classes', 'teachers'));
    }
    public function addeditclass()
    {
        // $subject = Subject::get();
        $teachers = User::where('role', '=', 'teacher')->get();
        return view('school.addeditclass', compact('teachers',));
    }
    public function show($id)
    {
        $show = Classes::findOrFail($id);
        // dd($show);
        return view('school.showclass')->with('show', $show);
    }
    public function store(Request $request)
    {
        $cdata = new Classes;
        $cdata->c_name = $request->c_name;
        $cdata->c_numaric_name = $request->c_numaric_name;
        $cdata->c_description = $request->c_description;
        $cdata->assign_teacher = $request->assign_teacher;
        $cdata->save();
        return redirect('class');
    }
    public function edit($id)
    {
        $subject = Subject::get();
        $cdata = Classes::findOrFail($id);
        $teachers = User::where('role', '=', 'teacher')->get();
        return view('school.addeditclass', compact('cdata', 'teachers','subject'));
    }

    public function update(Request $request, $id)
    {
        $cdata = Classes::findOrFail($id);
        $cdata->c_name = $request->c_name;
        $cdata->c_numaric_name = $request->c_numaric_name;
        $cdata->c_description = $request->c_description;
        $cdata->assign_teacher = $request->assign_teacher;
        $cdata->save();
        return redirect('class');
    }
    public function delete($id)
    {
        Classes::destroy($id);
        return redirect('class');
    }
}
