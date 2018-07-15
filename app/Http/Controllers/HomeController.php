<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;
use App\Models\ContentReport;
use App\Models\Book;
use App\Models\Student;

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
        $content_report = ContentReport::count();
        $last_book = Book::orderBy('created_at','desc')->get()->take(5);
        $book = Book::count();
        $admin = User::where('is_admin',true)->where('username','!=','admin')->count();
        $last_admin = User::where('is_admin',true)->where('username','!=','admin')->get()->take(5);
        $student = Student::count();

        return view('home',compact('content_report','book','admin','student','last_book','last_admin'));
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
