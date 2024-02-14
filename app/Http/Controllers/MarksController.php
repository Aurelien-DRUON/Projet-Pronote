<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\User;
use App\Models\Test;
use Illuminate\Http\Request;

class MarksController extends Controller
{
    public function create(Request $request)
    {
        $mark = new Mark();
        $mark->student_id = auth()->user()->id;
        $mark->test_id;
        $mark->mark = $request->input('mark');
        $mark->description = $request->input('description');
        $mark->date = $request->input('date');
        $mark->save();

        return redirect()->route('marks.read');
    }
    public function read()
    {
        $user = User::find(auth()->user()->id);
        if ($user->role == "1") {
            $tests = Test::where('matter', $user->matter)->get();
            return view('marks.read', ['tests' => $tests]);
        } else if ($user->role == "2") {
            $marks = Mark::where('student_id', auth()->user()->id)->get();
            return view('marks.read', ['marks' => $marks]);
        }
    }
}
