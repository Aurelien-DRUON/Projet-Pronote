<div style="width: 20%; height: 100%; border: 1px solid black">
    <div style="width: 100%; height: 80px; background-color:grey; border-bottom: 1px solid black; text-align:center">
        <p>{{ $user }}</p>
    </div>
    <div style="width: 100%; height: 80px; background-color:grey; border-bottom: 1px solid black; text-align:center">
        <a href="{{ route('tests.read') }}">Notes</a>
    </div>
    <div style="width: 100%; height: 80px; background-color:grey; border-bottom: 1px solid black; text-align:center">
        <a href="{{ route('stats.read') }}">Statistiques</a>
    </div>
</div>
