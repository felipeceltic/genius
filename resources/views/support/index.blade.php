@extends('layouts.app')

@section('title')
  Suporte - Genius
@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="alert alert-info">
        Seu formulário será enviado para o suporte e será atendido em breve. Entraremos em contato através do email fornecido. Obrigado!
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">{{ __('Entre em contato conosco') }}</div>

              <div class="card-body">
                  <form method="POST" action="{{ route('support.send') }}">
                      @csrf

                      <div class="mb-3 row">
                          <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Seu nome') }}</label>

                          <div class="col-md-6">
                              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                              @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="mb-3 row">
                          <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                          <div class="col-md-6">
                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="mb-3 row">
                          <label for="subject" class="col-md-4 col-form-label text-md-end">{{ __('Assunto') }}</label>

                          <div class="col-md-6">
                              <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" required>

                              @error('subject')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="mb-3 row">
                          <label for="message" class="col-md-4 col-form-label text-md-end">{{ __('Mensagem') }}</label>

                          <div class="col-md-6">
                              <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message" rows="5" required>{{ old('message') }}</textarea>

                              @error('message')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="mb-3 row">
                        <label for="attachment" class="col-md-4 col-form-label text-md-end">{{ __('Anexo') }}</label>
                    
                        <div class="col-md-6">
                            <input id="attachment" type="file" class="form-control @error('attachment') is-invalid @enderror" name="attachment">
                    
                            @error('attachment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>                    

                      <div class="mb-0 row">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary w-100">
                                  {{ __('Enviar') }}
                              </button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection