<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContentReport;

class ContentReportController extends Controller
{
    public function submit(Request $request)
    {
        $param = $request->all();

        $check_report = ContentReport::where('user_id',$param['user_id'])
                                    ->where('book_id',$param['book_id'])
                                    ->exists();
        if ($check_report) {
            flash('Anda Tidak Dapat Melaporkan Buku Lebih dari 1 Kali !')->error()->important();
        } else {
            $content_report = new ContentReport;
            $content_report->book_id = $param['book_id'];
            $content_report->user_id = $param['user_id'];
            $content_report->class = $param['class'];
            $content_report->description = $param['description'];

            $content_report->save();

            flash('Laporan Berhasil di kirim! Terima Kasih Atas Kontribusi Anda')->success()->important();
        }

        return back();

    }
}
