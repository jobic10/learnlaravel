<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

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
    public function getData(){
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        return $response->json();
    }
    public function stringPath(){
        $data = "Learning Fluent String";
        $string = Str::lower($data);
        // $string = Str::of($data)->lower();
        return view('string', compact('string'));
    }
}
