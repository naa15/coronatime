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
    <div>
        @yield('content')
    </div>
    @livewireScripts
</body>
</html>