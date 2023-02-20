<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('students.index', [
             'students' => Student::all(),
             'active' => 'Dashboard'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create', ['active' => 'Create Data']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
             'nama' => 'required',
             'kelas' => 'required',
             'jurusan' => 'required',
             'alamat_rumah' => 'required',
             'email' => 'required',
             'image' => 'required|max:2000'
        ]);
        // perlu diingat !!!
        if($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        Student::create($input);
        return redirect('/student')->with('success', 'Data berhasil di simpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('students.show', ['active' => 'Detail Siswa'])->with('student', $student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit', ['active' => 'Edit Data Siswa'])->with('student', $student);
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
        $student = Student::find($id);
        $input = $request->validate([
            'nama' => 'required',
             'kelas' => 'required',
             'jurusan' => 'required',
             'alamat_rumah' => 'required',
             'email' => 'required'
        ]);
        if($image = $request->file('image')) {
             $destinationPath = 'image/';
             $profileImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
             $image->move($destinationPath, $profileImage);
             $input['image'] = "$profileImage";
        };
        $student->update($input);
        return redirect('/student')->with('success', 'Berhasil mengedit data siswa!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        if($student->image) {
           $student->delete($student->image);
        }
        Student::destroy($id);
        return redirect('/student')->with('success', 'Data berhasil dihapus!');
    }
}
