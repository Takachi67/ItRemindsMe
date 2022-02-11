@extends('app')

@section('content')

    <div class="text-sm breadcrumbs w-11/12 md:w-2/3 mx-auto">
        <ul>
            <li>
                <a href="{{ route('dashboard') }}">{{ __('menu.home') }}</a>
            </li>
            <li>{{ __('menu.account') }}</li>
        </ul>
    </div>
    <div class="w-11/12 md:w-2/3 md:grid md:grid-cols-2 md:divide-x divide-y md:divide-y-0 mx-auto h-full">
        <form class="md:pr-5" method="POST" action="{{ route('users.update') }}">
            @csrf
            <h1 class="text-center mt-10 mb-5 md:mt-20 md:mb-10 text-xl md:text-3xl">{{ __('menu.account') }}</h1>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">{{ __('user.name') }} <span class="text-error">*</span></span>
                </label>
                <input type="text" placeholder="{{ __('user.name') }}" value="{{ $user->name }}" name="name"
                    class="hand-bordered input input-primary input-bordered border-primary">
                @error('name')
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                @enderror
            </div>
            <div class="form-control mt-5">
                <label class="label">
                    <span class="label-text">{{ __('user.email') }}</span>
                </label>
                <input type="text" placeholder="{{ __('user.email') }}" value="{{ $user->email }}"
                    class="hand-bordered input input-primary input-bordered disabled border-primary bg-base-300" disabled>
            </div>
            <div class="w-full mt-5 mb-10 md:mb-0">
                <button class="btn btn-primary mx-auto block">{{ __('default.save') }}</button>
            </div>
        </form>
        <form class="md:pl-5" method="POST" action="{{ route('users.updatePassword') }}">
            @csrf
            <h1 class="text-center mt-10 mb-5 md:mt-20 md:mb-10 text-xl md:text-3xl">{{ __('default.security') }}</h1>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">{{ __('user.password') }}</span>
                </label>
                <input type="password" placeholder="{{ __('user.password') }}" name="password"
                    class="hand-bordered input input-primary input-bordered border-primary">
                @error('password')
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                @enderror
            </div>
            <div class="form-control mt-5">
                <label class="label">
                    <span class="label-text">{{ __('user.password_confirmation') }}</span>
                </label>
                <input type="password" placeholder="{{ __('user.password_confirmation') }}" name="password_confirmation"
                    class="hand-bordered input input-primary input-bordered border-primary">
            </div>
            <div class="w-full mt-5">
                <button class="btn btn-primary mx-auto block">{{ __('default.update_password') }}</button>
            </div>
        </form>
    </div>

@endsection
