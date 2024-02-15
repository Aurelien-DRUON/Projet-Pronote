<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Pronote</title>
</head>

<body style="display:flex; flex-direction: row; margin: 0px;">
    <x-side-bar />
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button :href="route('logout')"
            onclick="event.preventDefault();
                        this.closest('form').submit();">
            {{ __('Log Out') }}
        </button>
    </form>
    <div>
        @yield('content')
    </div>
</body>

</html>
