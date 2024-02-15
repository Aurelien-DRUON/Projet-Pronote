@extends('layouts.layout')

@section('content')
    <form method="POST" action="{{ route('tests.store') }}">
        @csrf
        <label for="title">Nom du contrôle</label>
        <input type="text" name="title" id="title" required>
        <label for="coefficient">Coefficient</label>
        <input type="text" name="coefficient" id="coefficient" required>
        <button type="submit">Créer</button>
    </form>
    <a href="{{ route('tests.read') }}">Back</a>
@endsection
