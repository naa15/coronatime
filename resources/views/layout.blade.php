<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Coronatime</title>
    @livewireStyles
</head>
<body>
    <script src="{{ mix('js/app.js') }}" defer></script>

    @yield('content')
    
    @livewireScripts

</body>
</html>