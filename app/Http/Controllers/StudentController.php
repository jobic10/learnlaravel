<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Exception;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Payment\Payment;
use Illuminate\Support\Facades\Mail;

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
            $students = Student::paginate(5);//::all(['id','regno', 'firstname', 'lastname']);
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
            'regno' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'passport' => 'required|image'
        ]);
        try{
        $path =  ($request->file('passport')->store('passport'));
        $student = new Student();
        $student->regno = $request->regno;
        $student->firstname =  $request->firstname;
        $student->lastname = $request->lastname;
        $student->passport = $path;
        $student->save();
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
        $student = Student::join('cpu',$this->tableName.".cpu_id",'=','cpu.id')
        ->join('supervisors','cpu.supervisor_id','=','supervisors.id')
        ->select([
              $this->tableName.'.lastname',
            $this->tableName.'.firstname',
          $this->tableName.'.regno',
            "supervisors.lastname as supervisor"
            ])
        ->where($this->tableName.'.id',$id)->get()->first();

        // dd($student);
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
        $student = Student::findOrFail($id);
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
        $request->validate([
            'regno' => 'required|min:10|max:10',
            'firstname' => 'required',
            'lastname' => 'required',
        ]);
        try{
            $student = Student::findOrFail($id);
            if (!$student) return abort(404);
            $student->regno = $request->regno;
            $student->firstname =  $request->firstname;
            $student->lastname = $request->lastname;
            $student->save();

        return back()->with('response', 'Updated');
        }catch(Exception $e){
            return back()->with('response', 'Not Updated '. $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
                $student->delete();
                return back()->with('response', 'Student Deleted');
    }
    public function payment(){
        return Payment::process();
    }
    public function sendMail(){
        $details = [
            'title' => 'Mail From Laravel',
            'body' => 'Welcome to Laravel Mail',
        ];
        try{
            Mail::to('jobowonubi@gmail.com')->send(new TestMail($details));
            return "Email Sent";
        }catch(Exception $e){
            return "Unknown Error Occured";
        }
    }
}
