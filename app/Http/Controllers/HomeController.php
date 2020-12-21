<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

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
    public function reg(Request $req){
        if ($req->method() == 'POST'){
            $req->validate([
                'email' => 'required|email',
                'username' => 'required|min:5',
                'password' => 'required'
            ]);
            $req->session()->put('username', $req->username);
            echo "Passed validation test ".$req->session()->get('username');
        }else{
            echo session('username');
            return view('form');
        }
    }
    public function fetchDataFromDatabase(){
        $data = DB::table('students')->get(['regno', 'firstname', 'lastname']);
        return $data;
    }

}
