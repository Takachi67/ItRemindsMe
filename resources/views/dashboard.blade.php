@extends('app')

@section('content')

    <div class="container mx-auto my-5 flex flex-col md:flex-row items-center md:justify-evenly md:mt-40">
        <main-link link="{{ route('reminders.create') }}" icon="plus" text="{{ __('menu.new_reminder') }}"
            assets-url="{{ asset('img') }}"></main-link>
        <main-link link="{{ route('reminders.index') }}" icon="reminders" text="{{ __('menu.reminders') }}"
            assets-url="{{ asset('img') }}">
        </main-link>
        <main-link link="{{ route('teams.index') }}" icon="teams" text="{{ __('menu.teams') }}"
            assets-url="{{ asset('img') }}"></main-link>
    </div>

@endsection
