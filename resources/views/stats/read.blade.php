@extends('layouts.layout')
@section('content')
    @if ($role == '1')
        <div class="w-4/5 mx-auto mt-10">
            @php
                $global_average = 0;
                $global_coefficient = 0;
            @endphp
            <table class="w-full text-white bg-blue-500 divide-y divide-blue-600 table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Nom</th>
                        <th class="px-4 py-2">Coefficient</th>
                        <th class="px-4 py-2">Moyenne</th>
                    </tr>
                </thead>
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
                    <tbody>
                        <tr class="bg-blue-700 hover:bg-blue-800">
                            <td class="px-4 py-2">{{ $test->title }}</td>
                            <td class="px-4 py-2">{{ $test->coefficient }}</td>
                            <td class="px-4 py-2">{{ $average }}</td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
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
