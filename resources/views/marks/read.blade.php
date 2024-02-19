@extends('layouts.layout')

@section('content')
    @if ($role == '1')
        <div class="w-4/5 mx-auto mt-10">
            <h1>{{ $test->title }}</h1>
            <h2>{{ $test->matter }}</h2>
            <form method="POST" action="{{ route('marks.store', ['id' => $test->id]) }}">
                @csrf
                <table class="w-full text-white bg-blue-500 divide-y divide-blue-600 table-auto">
                    <thead>
                        <tr>
                            <th>Élève</th>
                            <th>Note</th>
                            <th>Commentaire</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            @php
                                $mark = $student->marks->where('test_id', $test->id)->first();
                            @endphp
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td>
                                    <input type="number" name="marks[{{ $student->id }}]" value="{{ $mark->mark ?? null }}"
                                        required style="color: black;">
                                </td>
                                <td>
                                    <input type="text" name="descriptions[{{ $student->id }}]"
                                        value="{{ $mark->description ?? null }}" style="color: black;">
                                </td>
                                <input type="hidden" name="student_id[{{ $student->id }}]" value={{ $student->id }}>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit">Enregistrer</button>
            </form>
        </div>
    @endif
@endsection
