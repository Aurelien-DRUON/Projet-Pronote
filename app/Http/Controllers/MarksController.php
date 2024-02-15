<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Test;

class MarksController extends Controller
{
    public function read(Test $id)
    {
        $students = User::query()->get();
        return view('marks.read', ['test' => $id, 'students' => $students]);
    }
}
