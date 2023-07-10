@extends('layouts.app')
@section('title')
    Lista de cadastros
@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card w-75">
            <div class="card-body">
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">Cód</th>
                            <th scope="col">CNPJ</th>
                            <th scope="col">Razão Social</th>
                            <th scope="col">Status</th>
                            <th scope="col">Comprador</th>
                            <th scope="col">RG</th>
                            <th scope="col">CPF</th>
                            <th scope="col">Ver mais</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sacados as $s)
                            <tr>
                                <th scope="row">{{ $s->codigo_sacado }}</th>
                                <td>{{ $s->cnpj }}</td>
                                <td>{{ $s->razao_social }}</td>
                                <td>{{ $s->status }}</td>
                                <td>{{ $s->comprador_autorizado }}</td>
                                <td>{{ $s->rg }}</td>
                                <td>{{ $s->cpf }}</td>
                                <td><a href="{{ route('sacado.details', $s->id) }}">mais</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $sacados->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
