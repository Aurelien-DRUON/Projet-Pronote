@extends('layouts.layout')

@section('content')
    @if ($role == '1')
        <div>
            @php
                $global_average = 0;
                $global_coefficient = 0;
            @endphp
            @foreach ($tests as $test)
                @php
                    $average = 0;
                    foreach ($test->marks as $mark) {
                        $average += $mark->mark;
                    }
                    $average /= count($test->marks);
                    $global_average += $average * $test->coefficient;
                    $global_coefficient += $test->coefficient;
                @endphp
                <div style="display: flex; flex-direction: row; gap: 8px;">
                    <p>{{ $test->title }}</p>
                    <p>Coeff: {{ $test->coefficient }}</p>
                    <p>Moyenne: {{ $average }}/20</p>
                </div>
            @endforeach
            @php
                $global_average /= $global_coefficient;
                $global_average = round($global_average, 2);
            @endphp
            <div>Moyenne générale: {{ $global_average }}</div>
        </div>
    @elseif($role == '2')
        <div>
            <p>WIP</p>
        </div>
    @endif
@endsection
