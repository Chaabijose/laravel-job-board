<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function about()
    {
        return view('/about');
    }

    public function contact()
    {
        return view('/contact');
    }
}
