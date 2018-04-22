<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Classes;


class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class = Classes::all();
        return view('admin.class.index',[
          'class' => $class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $param = $request->all();

        $save = Classes::saveClass($param);

        if ($save) {
          flash('Kelas Berhasil Ditambahkan')->success()->important();
        }else{
          flash('Kelas Gagal Ditambahkan')->error()->important();
        }

        return redirect(route('admin.classes.index'));
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
    public function edit(Classes $classes)
    {
        return view('admin.class.edit',[
          'classes'  => $classes
        ]);
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
      $param = $request->all();

      $save = Classes::saveClass($param,$id);

      if ($save) {
        flash('Kelas Berhasil Diubah')->success()->important();
      }else{
        flash('Kelas Gagal Diubah')->error()->important();
      }

      return redirect(route('admin.classes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classes $classes)
    {
      $classes->delete();

      flash('Kelas Berhasil Dihapus')->success()->important();

      return back();
    }
}
