<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" async>
    {{-- Compilar css y guardar en css/app.css  ver webpack.mix.js--}}
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" async>

</head>
<body>
    <div id="app">
        {{-- Componente principal --}}
        <app></app>
    </div>
</body>
{{-- Incluir el js compilado --}}
<script src="{{ mix('js/app.js') }}"></script>
</html>