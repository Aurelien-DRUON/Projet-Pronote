<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\User;
use App\Models\Test;

class TestsController extends Controller
{
    public function create()
    {
        $user = User::find(auth()->user()->id);
        return view('tests.create', ['role' => $user->role]);
    }
    public function read()
    {
        $user = User::find(auth()->user()->id);
        if ($user->role == "1") {
            $tests = Test::where('matter', $user->matter)->get();
            return view('tests.read', ['role' => $user->role, 'tests' => $tests]);
        } else if ($user->role == "2") {
            $marks = Mark::where('student_id', $user->id)->get();
            return view('tests.read', ['role' => $user->role, 'marks' => $marks]);
        }
    }

    public function store()
    {
        $matter = User::find(auth()->user()->id)->matter;
        $test = new Test();
        $test->matter = $matter;
        $test->title = request('title');
        $test->coefficient = request('coefficient');
        $test->save();

        return redirect()->route('tests.read');
    }
}
