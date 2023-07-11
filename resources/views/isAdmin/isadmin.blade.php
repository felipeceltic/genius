@extends('layouts.app')
@section('title')
    Sem permissão
@endsection

@section('content')
  <div class="container">
    <div class="alert alert-danger text-center">
      <h5>Somente <strong>administradores</strong> tem acesso a esta função</h5>
    </div>
      <div class="d-flex justify-content-center">
        <img src="{{ asset('svg/undraw_safe_re_kiil.svg') }}" alt="blocked">
      </div>
  </div>
@endsection