<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController
{
    public function index()
    {
        return view('index');
    }
}
