<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Default Title' }}</title>
</head>
<body>
    @php
    $active='text-blue-500';
    $notactive='text-green-500';
    @endphp
    <a href="{{ url('/home') }}" {{ request()->is('/home')?$active:$notactive }}>Home</a> |
    <a href="{{ url('/about') }}" {{ request()->is('/about')?$active:$notactive }}>About</a> |
    <a href="{{ url('/contact') }}" {{ request()->is('/contact')?$active:$notactive }}>Contact</a>
    <div class="container">
        {{ $slot}}
    </div>
    
</body>
</html>