<?php

namespace App\Http\Controllers\school;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use DB;

class ParentController extends Controller
{
    public function parent()
    {
        $pdata = User::where('role', "=", 'parent')->get();
        
        return view('school.parent')->with('pdata',$pdata);
    }
    public function addeditparent()
    {
        return view('school.addeditparent');
    }
    public function store(Request $request)
    {
        $pdata = new User;
        
        $pdata->name = $request->name;
        $pdata->email = $request->email;
        $pdata->password = $request->password;
        $pdata->phone = $request->phone;
        $pdata->gender = $request->btnradio;
        $pdata->current_address = $request->caddress;
        $pdata->permanent_address = $request->paddress;
        $pdata->image = $request->picture;
       
        $pdata->save();

        return redirect('/parent');
    }
    public function edit($id)
    {
        $pdata = User::findOrFail($id);
        return view('school.addeditparent')->with('pdata',$pdata);
    }
    public function update(Request $request, $id)
    {
        $pdata = User::findOrFail($id);
        $pdata->name = $request->name;
        $pdata->email = $request->email;
        $pdata->password = $request->password;
        $pdata->phone = $request->phone;
        $pdata->gender = $request->btnradio;
        $pdata->current_address = $request->caddress;
        $pdata->permenent_address = $request->paddress;
        $pdata->image = $request->picture;
       
        $pdata->save();

        return redirect('/parent');
    }
    public function show($id)
    {
        $pdata = User::findOrFail($id);
        return view('school.showparent')->with('pdata',$pdata);
    }
}
