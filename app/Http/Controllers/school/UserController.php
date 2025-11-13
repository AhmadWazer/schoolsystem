<?php

namespace App\Http\Controllers\school;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
class UserController extends Controller
{
    public function index()
    {
        $data = User::get();
        
        return view('account.useraccount')->with('data',$data);
    }
    public function create()
    {
        $role = DB::table('role')->get();
        return view('account.addedituseraccount')->with('role',$role);
    }
        public function store(Request $request)
    {

        $useraccount = new User;
        $useraccount->name = $request->name;
        $useraccount->email = $request->email;
        $useraccount->status = $request->status;
        $useraccount->role = $request->role;
        if ($request->password) {
            $useraccount->password = Hash::make($request->password);
        }
        $useraccount->save();
        return Redirect()->route("useraccount.index");
    }
    public function edit($id)
    {
        $role = DB::table('role')->get();
        $useraccount = User::findOrFail($id);
       
        return view('account.addedituseraccount')->with('useraccount',$useraccount)->with('role',$role);
    }
     public function update(Request $request, $id)
    {
        $useraccount = User::findOrFail($id);

        $useraccount->name = $request->name;
        $useraccount->email = $request->email;
        $useraccount->status = $request->status;
        $useraccount->role = $request->role;
        if ($request->password) {
            $useraccount->password = Hash::make($request->password);
        }
        $useraccount->save();
        return Redirect()->route("useraccount.index")->with('success', 'Category updated successfully');
    }
    public function destroy($id)
    {
        User::destroy($id);
        return Redirect()->route("useraccount.index")->with('success', 'Category deleted successfully');
    }
    public function userRole(Request $request)
    {
        $role_id = $request->role_id;
        $roleValue = DB::table('users')->where('role',$role_id)->get();

        return response()->json($roleValue);
    }

}