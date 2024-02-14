<?php
$a = 0;
foreach ($marks as $mark) {
    $a += $mark->mark;
}
if (count($marks) > 0) {
    $a = $a / count($marks);
    $average = 'La moyenne est de ' . $a . '/20';
} else {
    $average = 'Pas de notes';
}
?>

@extends('layouts.layout')

@section('content')
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button :href="route('logout')"
            onclick="event.preventDefault();
                        this.closest('form').submit();">
            {{ __('Log Out') }}
        </button>
    </form>
    <table>
        <tr>
            <th>Id</th>
            <th>Note</th>
            <th>Commentaire</th>
            <th>Date</th>
        </tr>
        @foreach ($marks as $mark)
            <tr>
                <td>{{ $mark->id }}</td>
                <td>{{ $mark->mark }}/20</td>
                <td>{{ $mark->description }}</td>
                <td>{{ $mark->date }}</td>
            </tr>
        @endforeach
    </table>
    <p>{{ $average }}</p>
@endsection
