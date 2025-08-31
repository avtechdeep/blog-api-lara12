<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    //
    function list()
    {
        return Student::all();
        
    }


    function addStudent(Request $request)
    {
        //return $request->input();
        //Validate API
        $rules = array(
            'name'=> 'required | min:2 | max:10',
            'email' => 'required | email',
            'phone' => 'required | numeric'
        );

        $validation = Validator::make($request->all(),$rules);

        if($validation->fails())
        {
            return $validation->errors();
        }
        else{
            $student = new Student;
            $student->name = $request->name;
            $student->email = $request->email;
            $student->phone = $request->phone;
            if($student->save())
            {
                return ["result"=>"Student Added"];
            }else{
                return ["result"=>"Operation Failed !"];
            }
        }

       
   
    }

    function updateStudent(Request $request)
    {
        //return $request->input();
        $student = Student::find($request->id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        if($student->save())
        {
            return ["result"=>"Student Updated"];
        }else{
            return ["result"=>"Operation Failed !"];
        }
   
    }

    function deleteStudent($id){
        // return $id;
        $student = Student::destroy($id);
        if($student)
        {
            return ["result"=>"Student Deleted"];
        }else{
            return ["result"=>"Operation Failed !"];
        }
        }





}

