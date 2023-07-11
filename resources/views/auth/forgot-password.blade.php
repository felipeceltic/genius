@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header">{{ __('Recuperação de senha') }}</div>

                    <div class="card-body">
                        <div class="mb-4 text-sm text-gray-600">
                            {{ __('Esqueceu sua senha? Sem problemas! insira seu email para configurar uma nova.') }}
                        </div>

                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        <x-jet-validation-errors class="mb-4" />

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="form-floating d-flex justify-content-center">
                                    <input type="email" name="email"
                                        class="w-75 form-control @error('email') is-invalid @enderror" id="email"
                                        placeholder="Seu email" autofocus>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary w-75">
                                {{ __('Enviar') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
