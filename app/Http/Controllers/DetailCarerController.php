<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailCarerController extends Controller
{
    public function index()
    {
        return view('user.detail-carer');
    }
}
