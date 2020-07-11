<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function notVerified()
    {
        return view('errors.notVerified');
    }

    public function notAuthorized()
    {
        return view('errors.notAuthorized');
    }
}
