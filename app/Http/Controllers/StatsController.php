<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\User;

class StatsController extends Controller
{
    public function read()
    {
        $user = User::find(auth()->user()->id);
        $tests = Test::where('matter', $user->matter)->get();
        return view('stats.read', ['role' => $user->role, 'tests' => $tests]);
    }
}
