<?php

namespace App\Http\Controllers;

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
        $tests = Test::where('matter', $user->matter)->get();
        return view('tests.read', ['role' => $user->role, 'tests' => $tests]);
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
