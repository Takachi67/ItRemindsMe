@extends('app')

@section('content')

    <div class="w-2/3 sm:w-3/4 mx-auto">
        <div class="text-sm breadcrumbs md:w-1/2 mx-auto">
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}">{{ __('menu.home') }}</a>
                </li>
                <li>{{ __('menu.teams') }}</li>
            </ul>
        </div>
    </div>
    <div class="mt-10 md:mt-20 w-2/3 sm:w-3/4 mx-auto">
        <h1 class="text-3xl mb-10 md:mb-20 font-bold text-center">{{ __('menu.teams') }}</h1>
        @if ($teams->count() === 0)
            <div class="hand-bordered md:w-1/2 mx-auto h-20 flex justify-center items-center">{{ __('team.none') }}</div>
        @else
            @foreach ($teams as $team)
                <a class="hand-bordered md:w-1/2 mx-auto h-20 flex justify-center items-center mb-5"
                    href="{{ route('teams.edit', $team->id) }}">{{ $team->name }}</a>
            @endforeach
        @endif
        <div class="w-full flex justify-center mt-10 md:mt-20">
            <a class="btn btn-primary" href="{{ route('teams.create') }}">{{ __('team.create') }}</a>
        </div>
    </div>

@endsection
