@extends('layouts.layout')

@section('content')
    @if ($role == '1')
        <div>
            @foreach ($tests as $test)
                <a href="{{ route('marks.read', ['id' => $test->id]) }}">
                    <div style="display: flex; flex-direction: row">
                        <p>{{ $test->title }}</p>
                        <p>{{ $test->coefficient }}</p>
                </a>
            @endforeach
        </div>
        <a href="{{ route('tests.create') }}">
            <button>Nouveau contrôle</button>
        </a>
    @elseif ($role == '2')
        <div style="display: flex; flex-direction: column">
            @foreach ($marks as $mark)
                <div style="display: flex; flex-direction: row">
                    <p>{{ $mark->test->title }}</p>
                    <p>{{ $mark->mark }}/20</p>
                    <p>{{ $mark->description }}</p>
                </div>
            @endforeach
        </div>
    @endif
@endsection
