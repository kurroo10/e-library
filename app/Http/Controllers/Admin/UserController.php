<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Models\Employee;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Employee::with('user')->get();

        return view('admin.user.index',[
          'users' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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

        $save = User::saveUser($param);

        if ($save) {
          flash('Petugas Berhasil Ditambahkan')->success()->important();
        }else{
          flash('Petugas Gagal Ditambahkan')->error()->important();
        }

        return redirect(route('admin.user.index'));
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
    public function edit(Employee $employee)
    {
        return view('admin.user.edit',[
          'employee'  => $employee
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
      $param = $request->all();

      $save = User::updateUser($param,$employee);

      if ($save) {
        flash('Petugas Berhasil Diubah')->success()->important();
      }else{
        flash('Petugas Gagal Diubah')->error()->important();
      }

      return redirect(route('admin.user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
      $user = User::find($employee->user_id);

      $employee->delete();
      $user->delete();

      flash('Petugas Berhasil Dihapus')->success()->important();

      return back();
    }
}
