<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Devmunity | {{ isset($titulo) ? $titulo : 'API' }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Style -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    @section('estilos')
    @show

</head>
<body>
    @yield('content')

    <div class="container">
        @yield('content-main')
    </div>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    @section('scripts')
    @show
</body>
</html>