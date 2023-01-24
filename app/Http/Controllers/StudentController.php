<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get students
        $students = Student::latest()->paginate(5);

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
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'number'     => 'required|min:5',
            'name'   => 'required|min:10',
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email'     => 'required|min:5',
            'phone'   => 'required|min:10'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/students', $image->hashName());

        //create post
        Student::create([
            'number'     => $request->number,
            'name'   => $request->name,
            'image'     => $image->hashName(),
            'email'     => $request->email,
            'phone'   => $request->phone
        ]);

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Saved!']);
    }
    
    /**
     * edit
     *
     * @param  mixed $student
     * @return void
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $student
     * @return void
     */
    public function update(Request $request, Student $student)
    {
        //validate form
        $this->validate($request, [
            'number'     => 'required|min:5',
            'name'   => 'required|min:10',
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email'     => 'required|min:5',
            'phone'   => 'required|min:10'
        ]);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/students', $image->hashName());

            //delete old image
            Storage::delete('public/students/'.$student->image);

            //update student with new image
            $student->update([
                'number'     => $request->number,
                'name'   => $request->name,
                'image'     => $image->hashName(),
                'email'     => $request->email,
                'phone'   => $request->phone
            ]);

        } else {

            //update student without image
            $student->update([
                'number'     => $request->number,
                'name'   => $request->name,
                'email'     => $request->email,
                'phone'   => $request->phone
            ]);
        }

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Changed!']);
    }
    
    /**
     * destroy
     *
     * @param  mixed $student
     * @return void
     */
    public function destroy(Student $student)
    {
        //delete image
        Storage::delete('public/students/'. $student->image);

        //delete post
        $student->delete();

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Deleted!']);
    }
}
