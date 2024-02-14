<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use Illuminate\Http\Request;

class MarksController extends Controller
{
    public function create(Request $request)
    {
        $mark = new Mark();
        $mark->student_id = auth()->user()->id;
        $mark->user_id = auth()->user()->id;
        $mark->mark = $request->input('mark');
        $mark->description = $request->input('description');
        $mark->date = $request->input('date');
        $mark->save();

        return redirect()->route('marks.read');
    }
    public function read()
    {
        $marks = Mark::find(1);
        return view('marks.read', ['marks' => $marks]);
    }
}
