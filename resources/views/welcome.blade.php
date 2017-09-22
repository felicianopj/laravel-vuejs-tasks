<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
        <meta name="_token" content="{{ csrf_token() }}"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="/css/app.css">
        <title>Laravel 5.3 with Vuejs</title>
    </head>
    <body>
        <div class="container" id="container">
            <tasks></tasks>
        </div>
        <script src="/js/app.js"></script>
    </body>
</html>
