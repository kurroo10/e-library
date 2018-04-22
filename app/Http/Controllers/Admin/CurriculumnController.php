<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Curriculumn;

class CurriculumnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
      $class    = Classes::where('name',$id)->first();
      $curriculumn  = [];
      if ($class) {
        $curriculumn = Curriculumn::where('class_id',$class->id)->get();
      }

      return view('admin.curriculumn.index',[
        'classes' => $id,
        'curriculumn' => $curriculumn
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($classes)
    {
      return view('admin.curriculumn.create',[
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

      $check = Curriculumn::where('slug',strtolower($param['name']))
                            ->where('class_id',$param['class']->id)
                            ->get();
      if (count($check) >= 1) {
        flash('Mata Pelajaran Tersebut Sudah Terdaftar')->warning()->important();

        return back()->withInput($request->input());
      }else {
        $save = Curriculumn::saveCurriculumn($param);

        if ($save) {
          flash('Mata Pelajaran Berhasil Ditambahkan')->success()->important();
        }else{
          flash('Mata Pelajaran Gagal Ditambahkan')->error()->important();
        }

        return redirect(route('admin.curriculumn.index',$id));
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
    public function edit($classes, Curriculumn $curriculumn)
    {
      return view('admin.curriculumn.edit',[
        'classes' => $classes,
        'curriculumn' => $curriculumn,
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$curriculumn)
    {
      $param          = $request->all();
      $param['class'] = Classes::where('name',$id)->first();

      $check = Curriculumn::where('slug',strtolower($param['name']))
                            ->where('class_id',$param['class']->id)
                            ->get();
      if (count($check) >= 1) {
        flash('Mata Pelajaran Tersebut Sudah Terdaftar')->warning()->important();

        return back()->withInput($request->input());
      }else {
        $save = Curriculumn::saveCurriculumn($param,$curriculumn);

        if ($save) {
          flash('Mata Pelajaran Berhasil Diubah')->success()->important();
        }else{
          flash('Mata Pelajaran Gagal Diubah')->error()->important();
        }

        return redirect(route('admin.curriculumn.index',$id));
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Curriculumn $curriculumn)
    {
      $curriculumn->delete();

      flash('Mata Pelajaran Berhasil Dihapus')->success()->important();

      return back();
    }
}
