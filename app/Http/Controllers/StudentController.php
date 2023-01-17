<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as DasarController;
use Illuminate\Support\Facades\DB;

use App\Models\Student;
class StudentController extends DasarController
{
    public function index()
    {
        $students = Student::all();

        //render view with students
        return view('students.index', compact('students'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */

    //  $_POST
    //  $_GET

    public function store(Request $request)
    {
        //validate form
        $request->validate([
            'name'     => 'required|min:5',
            'email'   => 'required|min:10'
        ]);

        //create post
        Student::create([
            'name'    => $request->name,
            'email'   => $request->email
        ]);

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

}
