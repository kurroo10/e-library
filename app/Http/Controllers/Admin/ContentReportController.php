<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContentReport;
use App\Models\Book;

class ContentReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = ContentReport::all();

        return view('admin.report.content_report.index', compact('content'));
    }

    public function nonactive($id)
    {
        $book = Book::find($id);

        $book->is_active = false;
        $book->save();
        
        flash('Buku Berhasil Di Non Aktifkan')->success()->important();

        return back();
    }

    public function active($id)
    {
        $book = Book::find($id);

        $book->is_active = true;
        $book->save();
        
        flash('Buku Berhasil Di Aktifkan')->success()->important();

        return back();
    }

    public function destroy($id)
    {
        $content_report = ContentReport::find($id);
        $content_report->destroy();

        flash('Laporan Berhasil Di Hapus')->success()->important();

        return back();
    }
}
