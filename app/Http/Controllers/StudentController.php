<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index() {
        $data = array("students" => DB::table('students')->orderBy('created_at', 'desc')->simplePaginate(10));
        // $data = Student::Where('age', '<=', 19)->orderby('last_name', 'asc')->get();
        // return view('students.index', ['students' => $data]);;
        // $data = DB::table('students')
        //         ->Select(DB::raw('count(*) as gender_count, gender'))->groupBy('gender')->get();
        // return view('students.index', ['students' => $data]);
        // $data = Student::Where('id', 1)->firstOrFail()->get();

        return view('students.index', $data);
    }

    public function show($id) {
        $data = Student::findOrFail($id);
        return view('students.edit', ['student' => $data]);     
}

    public function create() {
        return view('students.create')->with('title', 'Add New');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            "first_name" => ['required', 'min:4'],
            "last_name" => ['required', 'min:4'],
            "gender" => ['required'],
            "age" => ['required'],
            "email" => ['required', 'email', Rule::unique('students', 'email')], 
       ]);
         Student::create($validated); 
         return redirect('/')->with('message', 'New Student was added successfully');
    }

    public function update(Request $request, Student $student) {
        $validated = $request->validate([
            "first_name" => ['required', 'min:4'],
            "last_name" => ['required', 'min:4'],
            "gender" => ['required'],
            "age" => ['required'],
            "email" => ['required', 'email'],
       ]);
       $student->update($validated); 
       return back()->with('message', 'Data was successfully updated');
    // dd($request-all()); 
    }

    public function destroy(Student $student) {
        // dd($request->all());

        $student->delete();
        return redirect('/')->with('message', 'Data was successfully deleted');
    }

} 