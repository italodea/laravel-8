<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - {{config('app.name')}}</title>
     <!-- Fonts -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
     <link rel="stylesheet" href="https://static2.sharepointonline.com/files/fabric/office-ui-fabric-core/11.0.0/css/fabric.min.css"/>


     <!-- Styles -->
     <link rel="stylesheet" href="{{ asset('css/app.css') }}">
     <link rel="stylesheet" href="{{ asset('css/style.css') }}">

     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>


</head>
<body>
    <nav>
        @include('layouts.navigation')
    </nav>
    <div class="content">
        @yield('content')
    </div>
</body>
</html>