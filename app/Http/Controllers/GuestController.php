<?php

namespace App\Http\Controllers;

class GuestController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function contact()
    {
        return view('contact');
    }
}
