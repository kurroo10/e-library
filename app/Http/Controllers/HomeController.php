<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function changePassword(Request $request)
    {
        $param = $request->all();
        $user = User::find(auth()->user()->id);

        if (Hash::check($param['old_password'], $user->password)) {
            $user->update([
                'password' => bcrypt($param['password'])
            ]);

            flash('Password berhasil diubah !')->success()->important();
            Auth::logout();

            return redirect('login');

        } else {
            flash('Password Lama anda salah ! Silahkan Coba lagi')->error()->important();

            return back();
        }
        

    }
}
