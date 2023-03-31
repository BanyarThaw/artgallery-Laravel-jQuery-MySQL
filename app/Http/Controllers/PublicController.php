<?php

namespace App\Http\Controllers;

class PublicController extends Controller
{
    public function index() {
        return view('public.index');
    }
}
