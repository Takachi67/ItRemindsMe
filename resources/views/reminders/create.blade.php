@extends('app')

@section('content')

    <div class="text-sm breadcrumbs w-2/3 sm:w-1/2 mx-auto">
        <ul>
            <li>
                <a href="{{ route('dashboard') }}">{{ __('menu.home') }}</a>
            </li>
            <li>
                <a href="{{ route('reminders.index') }}">{{ __('menu.reminders') }}</a>
            </li>
            <li>{{ __('reminder.new') }}</li>
        </ul>
    </div>
    <form class="mt-10 w-2/3 sm:w-1/2 mx-auto" method="POST" action="{{ route('reminders.store') }}">
        @csrf
        <h1 class="text-3xl mb-10 md:mb-20 font-bold text-center">{{ __('reminder.new') }}</h1>
        <div class="form-control">
            <label class="label">
                <span class="label-text">{{ __('reminder.name') }} <span class="text-error">*</span></span>
            </label>
            <input type="text" placeholder="{{ __('reminder.name') }}" value="{{ old('name') }}" name="name"
                class="input input-primary input-bordered" required>
            @error('name')
                <label class="label">
                    <span class="label-text-alt text-error">{{ $message }}</span>
                </label>
            @enderror
        </div>
        <div class="form-control mt-3">
            <label class="label">
                <span class="label-text">{{ __('reminder.description') }}</span>
            </label>
            <textarea type="text" placeholder="{{ __('reminder.description') }}" name="description"
                class="input input-primary input-bordered min-h-36 pt-3">{{ old('description') }}</textarea>
            @error('description')
                <label class="label">
                    <span class="label-text-alt text-error">{{ $message }}</span>
                </label>
            @enderror
        </div>
        <div class="form-control mt-3">
            <label class="label">
                <span class="label-text">{{ __('reminder.team') }}</span>
            </label>
            <select name="team_id" class="input input-primary input-bordered">
                <option value="">{{ __('reminder.for_myself') }}</option>
                @foreach ($teams as $team)
                    <option value="{{ $team->id }}" @if (old('team_id') === $team->id) selected @endif>{{ $team->name }}</option>
                @endforeach
            </select>
            @error('team_id')
                <label class="label">
                    <span class="label-text-alt text-error">{{ $message }}</span>
                </label>
            @enderror
        </div>
        <div class="form-control mt-3">
            <label class="label">
                <span class="label-text">{{ __('reminder.expire_at') }}</span>
            </label>
            <input type="datetime-local" placeholder="{{ __('reminder.expire_at') }}" value="{{ old('expire_at') }}"
                name="expire_at" class="input input-primary input-bordered">
            @error('expire_at')
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
