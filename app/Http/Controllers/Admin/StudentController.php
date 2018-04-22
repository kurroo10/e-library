<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
      $class    = Classes::where('name',$id)->first();
      $student  = [];
      if ($class) {
        $student = Student::where('class_id',$class->id)->get();
      }

      return view('admin.student.index',[
        'classes' => $id,
        'student' => $student
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($classes)
    {
      return view('admin.student.create',[
        'classes' => $classes,
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
      $param          = $request->all();
      $param['class'] = Classes::where('name',$id)->first();

      $check = Student::find($param['nisn']);
      if ($check) {
        flash('NISN Siswa Sudah Terdaftar')->warning()->important();

        return back()->withInput($request->input());
      }else {
        $save = Student::saveStudent($param);

        if ($save) {
          flash('Data Siswa Berhasil Ditambahkan')->success()->important();
        }else{
          flash('Data Siswa Gagal Ditambahkan')->error()->important();
        }

        return redirect(route('admin.student.index',$id));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($classes, Student $student)
    {
      $class = Classes::where('name',$classes)->first();

      return view('admin.student.edit',[
        'classes' => $classes,
        'class' => $class,
        'student' => $student,
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$nisn)
    {
      $param          = $request->all();
      $param['class'] = Classes::where('name',$id)->first();

      $check = Student::where('nisn',$param['nisn'])->get();
      if (count($check) > 1) {
        flash('NISN Siswa Sudah Terdaftar')->warning()->important();

        return back()->withInput($request->input());
      }else {
        $student = Student::find($nisn);
        $save = Student::saveStudent($param,$student);

        if ($save) {
          flash('Data Siswa Berhasil Diubah')->success()->important();
        }else{
          flash('Data Siswa Gagal Diubah')->error()->important();
        }

        return redirect(route('admin.student.index',$id));
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Student $student)
    {
      $student->delete();

      flash('Siswa Berhasil Dihapus')->success()->important();

      return back();
    }
}
