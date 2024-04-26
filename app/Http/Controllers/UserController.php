<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function login()
    {
        return view("beamurid-akademis.login");
    }



    public function loginProcess(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $mahasiswa = Mahasiswa::where('nim', $request->username)
            ->orWhere('email', $request->username)
            ->orWhere('no_hp', $request->username)
            ->first();

        $admin = Admin::where('email', $request->username)
            ->first();

        if ($mahasiswa && Auth::attempt(['mahasiswa_id' => $mahasiswa->mahasiswa_id, 'password' => $request->password])) {
            session(['user_role' => 'mahasiswa']);
            return redirect()->intended('/akademis/dashboard');
        } elseif ($admin && Auth::attempt(['admin_id' => $admin->admin_id, 'password' => $request->password])) {
            session(['user_role' => 'admin']);
            return redirect()->intended('/akademis/dashboard');
        } else {
            return back()->withErrors(['error' => 'Invalid credentials'])->withInput();
        }
    }


}
