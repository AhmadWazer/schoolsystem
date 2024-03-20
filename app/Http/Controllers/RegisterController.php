<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function index()
    {
        return view('admin.register');
    }
    public function store(Request $request)
    {
        $value = User::create([
            'name' => $request->name,
            'email' => $request->email,
            // 'role' => $request->roles,
            'password' => Hash::make($request->password),
            // 'status' => 'pending',
        ]);
      $value->save();
            return redirect('/login');
    }
}