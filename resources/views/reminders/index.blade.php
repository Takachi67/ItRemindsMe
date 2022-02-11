@extends('app')

@section('content')

    <div class="w-2/3 sm:w-3/4 mx-auto">
        <div class="text-sm breadcrumbs md:w-1/2 mx-auto">
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}">{{ __('menu.home') }}</a>
                </li>
                <li>{{ __('menu.reminders') }}</li>
            </ul>
        </div>
    </div>
    <div class="mt-10 md:mt-20 w-2/3 sm:w-3/4 mx-auto">
        <h1 class="text-3xl mb-5 md:mb-10 md:w-1/2 mx-auto font-bold flex justify-between">
            <div class="w-10"></div>
            {{ __('menu.reminders') }}
            <a class="btn btn-primary rounded-full text-3xl" href="{{ route('reminders.create') }}">+</a>
        </h1>
        @if ($count === 0)
            <div class="hand-bordered md:w-1/2 mx-auto h-20 flex justify-center items-center">{{ __('reminder.none') }}
            </div>
        @else
            <button id="show-futurs-reminders" class="flex justify-center items-center mx-auto mb-5">
                <img src="{{ asset('img/loading.png') }}" class="w-5 h-5 mr-3">
                {{ __('reminder.show_futurs') }}
            </button>
            <div id="futurs-reminders" class="hidden">
                <h2 class="text-2xl mb-2 md:mb-5 md:w-1/2 mx-auto font-bold text-center">
                    {{ __('reminder.next_days') }}</h2>
                @foreach ($reminders['futurs'] as $reminder)
                    <a class="hand-bordered md:w-1/2 mx-auto h-20 flex justify-center items-center mb-5"
                        href="{{ route('reminders.edit', $reminder->id) }}">{{ $reminder->name }}</a>
                @endforeach
            </div>
            <h2 class="text-2xl mb-2 md:mb-5 md:w-1/2 mx-auto font-bold text-center">
                {{ __('reminder.today') }}</h2>
            @foreach ($reminders['today'] as $reminder)
                <a class="hand-bordered md:w-1/2 mx-auto h-20 flex justify-center items-center mb-5"
                    href="{{ route('reminders.edit', $reminder->id) }}">{{ $reminder->name }}</a>
            @endforeach
            <h2 class="text-2xl mb-2 md:mb-5 md:w-1/2 mx-auto font-bold text-center">
                {{ __('reminder.without_expiration_date') }}</h2>
            @foreach ($reminders['without_date'] as $reminder)
                <a class="hand-bordered md:w-1/2 mx-auto h-20 flex justify-center items-center mb-5"
                    href="{{ route('reminders.edit', $reminder->id) }}">{{ $reminder->name }}</a>
            @endforeach
            <button id="show-previous-reminders" class="flex justify-center items-center mx-auto mb-5">
                <img src="{{ asset('img/loading.png') }}" class="w-5 h-5 mr-3">
                {{ __('reminder.show_previous') }}
            </button>
            <div id="previous-reminders" class="hidden">
                <h2 class="text-2xl mb-2 md:mb-5 md:w-1/2 mx-auto font-bold text-center">
                    {{ __('reminder.previous') }}</h2>
                @foreach ($reminders['previous'] as $reminder)
                    <a class="hand-bordered md:w-1/2 mx-auto h-20 flex justify-center items-center mb-5"
                        href="{{ route('reminders.edit', $reminder->id) }}">{{ $reminder->name }}</a>
                @endforeach
            </div>
        @endif
        <div class="w-full flex justify-center mt-10 md:mt-20">
            <a class="btn btn-primary" href="{{ route('reminders.create') }}">{{ __('reminder.create') }}</a>
        </div>
    </div>

@endsection
