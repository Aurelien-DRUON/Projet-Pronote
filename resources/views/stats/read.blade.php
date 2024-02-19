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
                <div class="flex flex-row fixed-width gap-4">
                    <div>
                        <p class="text-gray-800">{{ $test->title }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600">Coeff: {{ $test->coefficient }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600">Moyenne: {{ $average }}/20</p>
                    </div>
                </div>
            @endforeach
            @php
                $global_average /= $global_coefficient;
                $global_average = round($global_average, 2);
            @endphp
            <div class="text-gray-800">Moyenne générale: {{ $global_average }}</div>
        </div>
    @elseif($role == '2')
        <div>
            <p>WIP</p>
        </div>
    @endif
@endsection
