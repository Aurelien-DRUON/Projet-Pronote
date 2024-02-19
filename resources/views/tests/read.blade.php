@extends('layouts.layout')

@section('content')
    @if ($role == '1')
        <div>
            @foreach ($tests as $test)
                <a href="{{ route('marks.read', ['id' => $test->id]) }}">
                    <div style="display: flex; flex-direction: row; gap:8px">
                        <p>{{ $test->title }}</p>
                        <p>Coeff: {{ $test->coefficient }}</p>
                    </div>
                </a>
            @endforeach
        </div>
        <a href="{{ route('tests.create') }}">
            <button>Nouveau contrôle</button>
        </a>
    @elseif ($role == '2')
        @php
            $average = 0;
            $denominator = 0;
            foreach ($marks as $mark) {
                $average += $mark->mark * $mark->test->coefficient;
                $denominator += $mark->test->coefficient;
            }
            $average /= $denominator;
            $average = round($average, 2);
        @endphp
        <div style="display: flex; flex-direction: column">
            @foreach ($marks as $mark)
                <div style="display: flex; flex-direction: row">
                    <p>{{ $mark->test->title }}</p>
                    <p>{{ $mark->mark }}/20</p>
                    <p>{{ $mark->description }}</p>
                </div>
            @endforeach
            <p>Moyenne : {{ $average }}/20</p>
        </div>
    @endif
@endsection
