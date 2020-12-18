<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $biodata = array(
            'name' => 'Owonubi Job Sunday',
            'gender' => 'Male',
            'dept' => 'CSC'
        );
        return view('home', compact('biodata'));
    }
}
