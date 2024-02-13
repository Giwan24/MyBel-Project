<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin;
use App\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function getLogin()
    {
      return view('admin.login');
    }
  
    public function postLogin(Request $request)
    {
  
        
  
        // Attempt to log the user in
        // Passwordnya pake bcrypt
        $data = DB::table('tbl_petugas');
      if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
          // if successful, then redirect to their intended location
        return redirect()->intended('/dashboard');
      } else {
        return redirect('/login')->with('message','username atau password salah');
      }
  
    }
  
    public function logout()
    {
      if (Auth::guard('admin')->check()) {
        Auth::guard('admin')->logout();
      } elseif (Auth::guard('user')->check()) {
        Auth::guard('user')->logout();
      }
  
      return redirect('/login');
  
    }
}
