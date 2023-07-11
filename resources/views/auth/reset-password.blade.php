@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header">{{ __('Atualização de senha') }}</div>

                    <x-jet-validation-errors class="mb-4" />
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="block">
                                <x-jet-label for="email" value="{{ __('Email') }}" />
                                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email', $request->email)" required autofocus />
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="password" value="{{ __('Nova senha') }}" />
                                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password"
                                    required autocomplete="new-password" />
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="password_confirmation" value="{{ __('Confirme a senha') }}" />
                                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-jet-button>
                                    {{ __('Atualizar senha') }}
                                </x-jet-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
