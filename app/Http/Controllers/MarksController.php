<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\User;
use App\Models\Test;
use Illuminate\Http\Request;

class MarksController extends Controller
{
    public function read(Test $id)
    {
        $user = User::find(auth()->user()->id);
        $students = User::where('role', '2')->get();
        return view('marks.read', ['role' => $user->role, 'test' => $id, 'students' => $students]);
    }

    public function store(Test $id, Request $request)
    {
        $student_ids = $request->get('student_id');
        $marks = $request->get('marks');
        $descriptions = $request->get('descriptions');

        foreach ($student_ids as $key => $studentId) {
            $mark = Mark::where('student_id', $studentId)
                ->where('test_id', $id->id)
                ->first();

            if ($mark) {
                $mark->mark = $marks[$key];
                $mark->description = $descriptions[$key] ?? null;
                $mark->date = date('Y-m-d');
                $mark->save();
            } else {
                $newMark = new Mark();
                $newMark->student_id = $studentId;
                $newMark->test_id = $id->id;
                $newMark->mark = $marks[$key];
                $newMark->description = $descriptions[$key] ?? null;
                $newMark->date = date('Y-m-d');
                $newMark->save();
            }
        }

        $user = User::find(auth()->user()->id);
        $students = User::where('role', '2')->get();
        return view('marks.read', ['role' => $user->role, 'test' => $id, 'students' => $students]);
    }
}
