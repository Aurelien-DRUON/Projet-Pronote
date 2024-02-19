<div class="w-60 h-screen bg-blue-500">
    <div class="w-full h-1/6 bg-blue-500 text-center hover:bg-blue-600 flex justify-center">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <p class="m-0 text-white">{{ $user }}</p>
            <button class="text-white hover:text-blue-700"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
    <a href="{{ route('tests.read') }}" class="text-white hover:text-blue-700">
        <div class="w-full h-1/6 bg-blue-500 text-center hover:bg-blue-600 flex justify-center items-center">
            <div class="flex justify-center">
                Notes
            </div>
        </div>
    </a>
    <a href="{{ route('stats.read') }}" class="text-white hover:text-blue-700">
        <div class="w-full h-1/6 bg-blue-500  text-center hover:bg-blue-600 flex justify-center items-center">
            <div class="flex justify-center">
                Statistiques
            </div>
        </div>
    </a>
</div>
