<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function dashboard(){
        return view('dashboard');
    }
}
