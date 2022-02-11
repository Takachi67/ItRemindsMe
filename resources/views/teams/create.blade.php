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
            <li>{{ __('team.new') }}</li>
        </ul>
    </div>
    <form class="mt-10 w-2/3 sm:w-1/2 mx-auto" method="POST" action="{{ route('teams.store') }}">
        @csrf
        <h1 class="text-3xl mb-10 md:mb-20 font-bold text-center">{{ __('team.new') }}</h1>
        <div class="form-control">
            <label class="label">
                <span class="label-text">{{ __('team.name') }} <span class="text-error">*</span></span>
            </label>
            <input type="text" placeholder="{{ __('team.name') }}" value="{{ old('name') }}" name="name"
                class="input input-primary input-bordered">
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

@endsection
