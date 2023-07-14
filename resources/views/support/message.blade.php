@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Email') }}</div>

                <div class="card-body">
                    <h5 class="card-title">Assunto: {{ $data['subject'] }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">De: {{ $data['name'] }}</h6>

                    <p class="card-text">{{ $data['message'] }}</p>

                    @if ($attachmentPath)
                        <p class="card-text">
                            <strong>Anexo:</strong> <a href="{{ asset('storage/' . $attachmentPath) }}" target="_blank" rel="noopener noreferrer">Download</a>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
