@extends('guest')

<div class="container mx-auto h-full flex flex-col justify-center items-center">
    <form class="w-3/4 md:w-1/3 bg-white p-5 rounded-l" method="POST" action="{{ route('login') }}">
        @csrf
        <h1 class="text-3xl pb-5 font-bold text-center">{{ __('auth.login') }}</h1>
        <div class="form-control">
            <label for="email" class="label">
                <span class="label-text">{{ __('user.email') }} <span class="text-red-700">*</span></span>
            </label>
            <input type="text" id="email" name="email" placeholder="{{ __('user.email') }}"
                class="input input-bordered" required>
            @error('email')
                <span class="label-text text-red-700">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-control mt-3">
            <label for="password" class="label">
                <span class="label-text">{{ __('user.password') }} <span class="text-red-700">*</span></span>
            </label>
            <input type="password" id="password" name="password" placeholder="{{ __('user.password') }}"
                class="input input-bordered" required>
            @error('password')
                <span class="label-text text-red-700">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-5 w-full">{{ __('auth.login') }}</button>
    </form>
    <p class="w-1/3 text-center">
        {{ __('auth.not_registered') }}
        <a class="text-blue-500 hover:text-blue-700 underline" href="{{ route('register') }}">
            {{ __('auth.register') }}
        </a>
    </p>
</div>
