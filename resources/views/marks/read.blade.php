@extends('layouts.layout')

@section('content')
    @if ($role == '1')
        <h1>{{ $test->title }}</h1>
        <h2>{{ $test->matter }}</h2>
        <form method="POST" action="{{ route('marks.store', ['id' => $test->id]) }}">
            @csrf
            <table>
                <tr>
                    <th>Student</th>
                    <th>Mark</th>
                </tr>
                @foreach ($students as $student)
                    @php
                        $mark = $student->marks->where('test_id', $test->id)->first();
                    @endphp
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>
                            <input type="number" name="marks[{{ $student->id }}]" value="{{ $mark->mark ?? null }}" required>
                            <input type="text" name="descriptions[{{ $student->id }}]"
                                value="{{ $mark->description ?? null }}">
                            <input type="hidden" name="student_id[{{ $student->id }}]" value={{ $student->id }}>
                        </td>
                    </tr>
                @endforeach

            </table>
            <button type="submit">Enregistrer</button>
        </form>
    @endif
@endsection
