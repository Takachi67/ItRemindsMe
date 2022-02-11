@extends('app')

@section('content')

    <div class="text-sm breadcrumbs w-2/3 sm:w-1/2 mx-auto">
        <ul>
            <li>
                <a href="{{ route('dashboard') }}">{{ __('menu.home') }}</a>
            </li>
            <li>
                <a href="{{ route('teams.index') }}">{{ __('menu.teams') }}</a>
            </li>
            <li>{{ $team->name }}</li>
        </ul>
    </div>
    <form class="mt-10 w-2/3 sm:w-1/2 mx-auto" method="POST" action="{{ route('teams.update', $team->id) }}">
        @csrf
        <h1 class="text-3xl mb-10 md:mb-20 font-bold text-center">{{ $team->name }}</h1>
        <div class="form-control">
            <label class="label">
                <span class="label-text">{{ __('team.name') }} <span class="text-error">*</span></span>
            </label>
            <input type="text" placeholder="{{ __('team.name') }}" value="{{ old('name', $team->name) }}" name="name"
                class="hand-bordered input input-primary input-bordered border-primary">
            @error('name')
                <label class="label">
                    <span class="label-text-alt text-error">{{ $message }}</span>
                </label>
            @enderror
        </div>
        <div class="w-full flex justify-center mt-10 md:mt-20">
            <button class="btn btn-primary">{{ __('default.save') }}</button>
        </div>
    </form>
    <h1 class="text-3xl mb-10 font-bold text-center mt-10 md:mt-20">{{ __('team.members') }}</h1>
    @foreach ($team->users as $user)
        <div class="hand-bordered w-2/3 md:w-1/3 mx-auto h-20 flex justify-center items-center mb-5">
            {{ $user->name }}
        </div>
    @endforeach
    <form class="form-control w-2/3 sm:w-1/3 mx-auto mt-10 md:mt-20" method="POST"
        action="{{ route('teams.addMember', $team->id) }}">
        @csrf
        <div class="flex space-x-2">
            <input type="text" value="{{ old('email') }}" name="email" placeholder="{{ __('team.new_member_email') }}"
                class="hand-bordered w-full input input-primary input-bordered border-primary-focus">
            <button class="btn btn-primary text-3xl">+</button>
        </div>
        @error('email')
            <label class="label">
                <span class="label-text-alt text-error">{{ $message }}</span>
            </label>
        @enderror
    </form>

@endsection
