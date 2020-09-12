<?php

namespace App\Http\Controllers;

use App\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index()
    {
       $noticeTop = Notice::orderBy('created_at','desc')->first();
       $notice =  Notice::orderBy('created_at','desc')->offset(1)
               ->limit(5)
               ->get();;
        return view('pages.notice',compact('notice','noticeTop'));
    }

    public function create()
    {
        return view('pages.add.showNoticeForm');
    }

    public function store(Request $request)
    {
        $sanitized = $request->validate([
           'notice'=>'required'
        ]);

        Notice::create($sanitized);
        return redirect()->back();
    }
}
