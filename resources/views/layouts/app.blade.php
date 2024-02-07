<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>

    @include('libraries.styles')
</head>
<body>

    {{-- add styles --}}
    @include('Components.nav')

    {{-- can extend the code --}}
    @yield('content') 

    {{-- add script --}}
    @include('libraries.scripts')
</body>
</html>
