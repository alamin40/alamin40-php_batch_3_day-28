<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use function Symfony\Component\Finder\name;

class StudentController extends Controller
{
    protected $name;
    protected $city;
    protected $student;
    protected $students;



    public function create(Request $request)
    {
        $this->student = new Student();
        $this->student->name = $request->name;
        $this->student->email = $request->email;
        $this->student->mobile = $request->mobile;
        $this->student->save();
        return redirect()->back()->with('message', 'Student info save successfully');
    }

    public function index()
    {
        return view('add-student');
















//        $this->name = 'BITM';
//        $this->city = 'Dhaka';
//        $data = 'Dhaka';
//        $dat = 'Dhaka1';
//
//        $this->student = new Student();
//        $this->student->newStudent();
//        return 'success';


//        $this->students = Student::getAllStudent();
//        return view('all', ['students' => $this->students]);

//        return view('all')->with([
//            'data' => $this->name,
//            'rafa' => $this->city
//        ]);

//        return view('all', compact('data', 'dat'));
    }

    public function manage()
    {
//        return Student::orderBy('id', 'desc')->get();


//        return Student::orderBy('id', 'desc')->skip(1)->first();
//        return Student::orderBy('id', 'desc')->skip(1)->take(5)->first();
//        return Student::orderBy('id', 'desc')->take(1)->get();
//        return Student::orderBy('id', 'desc')->first();
//        return Student::all();

        $this->students = Student::orderby('id', 'desc')->get();
        return view('manage-student', ['students' => $this->students]);
    }

    public function edit($id)
    {
        $this->student = Student::find($id);
//        return $this->student;

        return view('edit-student',['student' => $this->student]);
    }

    public function update(Request $request, $id)
    {
       $this->student = Student::find($id);
       $this->student->name = $request->name;
       $this->student->email = $request->email;
       $this->student->mobile = $request->mobile;
       $this->student->save();

       return redirect('/manage-student')->with('message', 'Student info update successfully');
    }

    public function delete($id)
    {
      $this->student = Student::find($id);
      $this->student->delete();
      return redirect('/manage-student')->with('message', 'Student info deleted successfully');
    }
}
