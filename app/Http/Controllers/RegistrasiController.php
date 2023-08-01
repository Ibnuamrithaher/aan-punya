<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    //
    public function index(){

    }
    public function create(){
        return view('auth.register');
    }
    
    public function store(Request $request){
        $registrasi = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('login')->with('succes','Create Your Acount Succesfully');
    }

    public function edit($id){

    }

    public function update($id){

    }

    public function destroy($id){

    }
}
