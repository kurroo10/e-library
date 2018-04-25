<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Book;
use App\Models\Curriculumn;
use carbon\Carbon;
use Storage;
use File;

class BookController extends Controller
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
        $book = Book::where('class_id',$class->id)->get();
      }

      return view('admin.book.index',[
        'classes' => $id,
        'book' => $book
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($classes)
    {
      $start = Carbon::now()->subYear(10)->year;
      $end = Carbon::now()->year;
      for ($i=$end; $i >= $start; $i--) {
        $year[$i]=$i;
      }
      $class    = Classes::where('name',$classes)->first();
      $curriculumn = Curriculumn::where('class_id',$class->id)->get()->pluck('name','id');

      return view('admin.book.create',[
        'classes' => $classes,
        'year' => $year,
        'curriculumn' => $curriculumn,
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

      $check = Book::where('isbn',$param['isbn'])->get();
      if (count($check) >= 1) {
        flash('ISBN Buku Tersebut Sudah Terdaftar')->warning()->important();

        return back()->withInput($request->input());
      }else {
        if ($request->file('cover')) {
          $cover = $request->file('cover');
          $param['image'] = uniqid().'.'.$cover->getClientOriginalExtension();
          Storage::disk('cover')->put($param['image'], file_get_contents($cover->getRealPath()));
        }

        if ($request->file('file')) {
          $file = $request->file('file');
          $param['pdf'] = uniqid().'.'.$file->getClientOriginalExtension();
          Storage::disk('file')->put($param['pdf'], file_get_contents($file->getRealPath()));
        }

        $save = Book::saveBook($param);

        if ($save) {
          flash('Data Buku Berhasil Ditambahkan')->success()->important();
        }else{
          flash('Data Buku Gagal Ditambahkan')->error()->important();
        }

        return redirect(route('admin.book.index',$id));
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
        $book = Book::find($id);
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

        // return view('admin.book.view',[
        //   'book' => $book
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($classes, Book $book)
    {
      $start = Carbon::now()->subYear(10)->year;
      $end = Carbon::now()->year;
      for ($i=$end; $i >= $start; $i--) {
        $year[$i]=$i;
      }
      $class    = Classes::where('name',$classes)->first();
      $curriculumn = Curriculumn::where('class_id',$class->id)->get()->pluck('name','id');


      return view('admin.book.edit',[
        'classes'     => $classes,
        'book'        => $book,
        'year'        => $year,
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
    public function update(Request $request, $id,$book)
    {
      $param          = $request->all();
      $param['class'] = Classes::where('name',$id)->first();

      $check = Book::where('isbn',$param['isbn'])->get();
      if (count($check) > 1) {
        flash('ISBN Buku Tersebut Sudah Terdaftar')->warning()->important();

        return back()->withInput($request->input());
      }else {
        if ($request->file('cover')) {
          $cover = $request->file('cover');
          $param['image'] = uniqid().'.'.$cover->getClientOriginalExtension();
          Storage::disk('cover')->put($param['image'], file_get_contents($cover->getRealPath()));
        }

        if ($request->file('file')) {
          $file = $request->file('file');
          $param['pdf'] = uniqid().'.'.$file->getClientOriginalExtension();
          Storage::disk('file')->put($param['pdf'], file_get_contents($file->getRealPath()));
        }

        $save = Book::saveBook($param,$book);

        if ($save) {
          flash('Data Buku Berhasil Diubah')->success()->important();
        }else{
          flash('Data Buku Gagal Diubah')->error()->important();
        }

        return redirect(route('admin.book.index',$id));
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Book $book)
    {
      $book->delete();

      flash('Data Buku Berhasil Dihapus')->success()->important();

      return back();
    }
}
