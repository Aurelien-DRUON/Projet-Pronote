<div style="width: 20%; height: 100%; border: 1px solid black">
    <div style="width: 100%; height: 80px; background-color:grey; border-bottom: 1px solid black; text-align:center">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <p style="margin: 0px; color:white;">{{ $user }}</p>
            <button :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
    <div style="width: 100%; height: 80px; background-color:grey; border-bottom: 1px solid black; text-align:center">
        <a href="{{ route('tests.read') }}">Notes</a>
    </div>
    <div style="width: 100%; height: 80px; background-color:grey; border-bottom: 1px solid black; text-align:center">
        <a href="{{ route('stats.read') }}">Statistiques</a>
    </div>
</div>
