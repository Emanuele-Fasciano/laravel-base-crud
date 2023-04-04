<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    @yield('cdn')
    @vite('resources/js/app.js')
</head>

<body>
    @include('partials.header')
    <div class="container">
        <h1 class="my-4">@yield('title')</h1>
        @yield('content')
    </div>
</body>

</html>
