<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $tableName = 'students';
    public function index()
    {
            $students = DB::table($this->tableName)->get(['id','regno', 'firstname', 'lastname']);
            return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'regno' => 'required|min:10|max:10',
            'firstname' => 'required',
            'lastname' => 'required',
        ]);
        try{

        DB::table($this->tableName)->insert([
            'regno' => $request->regno,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname
        ]);
        return back()->with('response', 'Created');
        }catch(Exception $e){
            return back()->with('response', 'Not Created '. $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = DB::table($this->tableName)->find($id);
        if ($student){
                return view('students.view', compact('student'));
        }else{
            return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = DB::table($this->tableName)->find($id);
        return view('students.create', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = DB::table($this->tableName)->find($id);
        if ($student){
                $student->delete();
                return back()->with('response', 'Student Deleted');
        }else{
            return abort(404);
        }
    }
}
