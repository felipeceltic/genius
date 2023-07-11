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
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Nova senha</label>
                                <input type="password" name="password" class="form-control" id="password" required autocomplete="new-password">
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirme a senha</label>
                                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required autocomplete="new-password">
                            </div>

                            <button type="submit" class="btn btn-primary w-75">
                                {{ __('Atualizar') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
