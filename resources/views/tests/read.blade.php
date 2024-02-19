@extends('layouts.layout')

@section('content')
    @if ($role == '1')
        <div class="w-4/5 mx-auto mt-10">
            <table class="w-full text-white bg-blue-500 divide-y divide-blue-600 table-auto">
                <thead>
                    <tr>
                        <th>Test</th>
                        <th>Coefficient</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tests as $test)
                        <tr>
                            <td>
                                <a href="{{ route('marks.read', ['id' => $test->id]) }}">{{ $test->title }}
                                </a>
                            </td>
                            <td>{{ $test->coefficient }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ route('tests.create') }}">
            <button>Nouveau contrôle</button>
        </a>
    @elseif ($role == '2')
        <div class="w-4/5 mx-auto mt-10">
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
            <table class="w-full text-white bg-blue-500 divide-y divide-blue-600 table-auto">
                <thead>
                    <tr>
                        <th>Test</th>
                        <th>Note</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($marks as $mark)
                        <tr>
                            <td>{{ $mark->test->title }}</td>
                            <td>{{ $mark->mark }}/20</td>
                            <td>{{ $mark->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p>Moyenne : {{ $average }}/20</p>
        </div>
    @endif
@endsection
