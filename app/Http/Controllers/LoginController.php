<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index(Request $request){
        return view('auth.login', [
            'TITLE' => 'Login'
        ]);
    }

    public function authenticate(Request $request){
        //return $request->all();
        //dd(decrypt('eyJpdiI6IkU2OHRwSWJ4eHFzTGVKSzRORHo1MUE9PSIsInZhbHVlIjoiVHlyNmxVWVFhSXA5VExWQ01QKzhIUT09IiwibWFjIjoiYmI2MWQyNTczODg3NjA5ZDA4MzM4YzQ2YzU2ZjM2N2FhZGQ0NTE4MmUzOWMwZDc5ODYwMWU0MGQyZWNhOWFkOSIsInRhZyI6IiJ9'));
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        //dd(Auth::attempt($credentials));
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('login');
    }
    
}
