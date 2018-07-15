<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Classes;
use App\Models\Curriculumn;
use App\Models\Student;
use File;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $book = Book::where('is_active',true)->paginate(9);

      return view('user.index',[
        'book' => $book,
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $param = decrypt($id);
        $book = Book::find($param);

        $book->is_visited = ($book->is_visited) +1;
        $book->save(); 

        $user = Student::with('class')
                        ->where('user_id',Auth::user()->id)
                        ->first();

        return view('user.show',[
          'book' => $book,
          'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pdf($id)
    {
      $param = decrypt($id);

      $book = Book::find($param);
       if($book){
                $file =  base_path().'/public/storage/file/'.$book->file;
              if (file_exists($file)){

                 $ext =File::extension($file);

                  if($ext=='pdf'){
                      $content_types='application/pdf';
                  }
                  return response(file_get_contents($file),200)
                         ->header('Content-Type',$content_types);
              }else{
               exit('Requested file does not exist on our server!');
              }

         }else{
           exit('Invalid Request');
         }
    }

    public function find(Request $req)
    {
      $param  = $req->all();
      $book   = Book::where('title','like','%'.$param['val'].'%')
                    ->where('is_active',true)
                    ->orWhere('author','like','%'.$param['val'].'%')
                    ->get();

      return view('user.data',[
        'book' => $book
      ]);
    }
}
