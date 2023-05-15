<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="shortcut icon" href="{{ asset('assets/favicons/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/cute-alert/style.css') }}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css"/>
</head>

<body>

<div id="app">
    @include('alerts.toasts')
    @include('navigations.navbar')

    <div class="container">
        <div class="row">
            @yield('content')
        </div>
    </div>
</div>

<script>window.CSRF = { csrfToken: '{{ csrf_token() }}' }</script>
<script src="{{ asset('assets/libs/cute-alert/cute-alert.js') }}"></script>
<script src="{{ mix('js/app.js') }}"></script>

</body>
