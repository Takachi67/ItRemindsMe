@extends('guest')

<div class="container mx-auto h-full flex flex-col justify-center items-center">
    <form class="w-3/4 md:w-1/3 bg-white p-5 text-center rounded-l" method="POST" action="{{ route('register') }}">
        @csrf
        <h1 class="text-3xl pb-5 font-bold">{{ __('auth.register') }}</h1>
        <div class="form-control">
            <label for="name" class="label">
                <span class="label-text">{{ __('user.name') }}</span>
            </label>
            <input type="text" id="name" name="name" placeholder="{{ __('user.name') }}" class="input input-bordered">
            @error('name')
                <span class="label-text text-red-700 text-left">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-control mt-3">
            <label for="email" class="label">
                <span class="label-text">{{ __('user.email') }}</span>
            </label>
            <input type="text" id="email" name="email" placeholder="{{ __('user.email') }}"
                class="input input-bordered">
            @error('email')
                <span class="label-text text-red-700 text-left">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-control mt-3">
            <label for="password" class="label">
                <span class="label-text">{{ __('auth.password') }}</span>
            </label>
            <input type="password" id="password" name="password" placeholder="{{ __('auth.password') }}"
                class="input input-bordered">
            @error('password')
                <span class="label-text text-red-700 text-left">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-control mt-3">
            <label for="password-confirmation" class="label">
                <span class="label-text">{{ __('user.password_confirmation') }}</span>
            </label>
            <input type="password" id="password-confirmation" name="password_confirmation"
                placeholder="{{ __('user.password_confirmation') }}" class="input input-bordered">
        </div>
        <button type="submit" class="btn btn-primary mt-5 w-full">{{ __('auth.create_account') }}</button>
    </form>
    <p class="w-1/3 text-center">
        {{ __('auth.already_registered') }}
        <a class="text-blue-500 hover:text-blue-700 underline" href="{{ route('login') }}">
            {{ __('auth.login') }}
        </a>
    </p>
</div>
