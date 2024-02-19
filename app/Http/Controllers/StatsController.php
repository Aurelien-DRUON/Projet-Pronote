<?php

namespace App\Http\Controllers;

class StatsController extends Controller
{
    public function read()
    {
        return view('stats.read');
    }
}
