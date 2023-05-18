<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page-title')</title>
    @vite('resources/js/app.js')

</head>
<body class="bg-black">

    @include('partials.header')

        <main>
            <div class="container">
                @if (session('status'))
                    <div class="alert alert-success my-3">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger my-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            
                @yield('content')
            </div>
        </main>

    @include('partials.footer')

</body>
</html>