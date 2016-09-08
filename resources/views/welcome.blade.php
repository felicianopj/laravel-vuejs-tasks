<!DOCTYPE html>
<html lang="en">
    <head>
        <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' };</script>
        <meta name="_token" content="{{ csrf_token() }}"/>
        <link rel="stylesheet" href="/css/app.css">
        <title>Laravel 5.3 with VueJS</title>
    </head>
    <body>
        <div class="container">
            <tasks></tasks>
        </div>
        <script src="/js/app.js"></script>
    </body>
</html>
