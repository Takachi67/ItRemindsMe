<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    @routes

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="{{ mix('js/app.js') }}"></script>
</head>

<body class="min-h-screen bg-base-200" id="main">
    @include('header')

    @if (session()->has('success'))
        <div class="alert alert-success rounded-none" id="success-message">
            <div class="flex-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="w-6 h-6 mx-2 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <label>{{ session()->get('success') }}</label>
            </div>
            <button id="dismiss-success">X</button>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-error rounded-none" id="error-message">
            <div class="flex-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="w-6 h-6 mx-2 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <label>{{ session()->get('error') }}</label>
            </div>
            <button id="dismiss-error">X</button>
        </div>
    @endif

    @yield('content')

    @yield('footer_scripts')
</body>

</html>
