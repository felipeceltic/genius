@extends('layouts.app')
@section('title')
    Lista de cadastros
@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <form action="{{ route('sacado.search') }}" method="GET" id="search-form">
            @csrf
            <div class="d-flex justify-content-center gap-3">
                <div class="input-group mb-3 w-75">
                    <input name="razao" type="text" class="form-control" placeholder="Buscar razão"
                        aria-label="Buscar razão" aria-describedby="button-razao" value="{{ old('razao') }}">
                    <button class="btn btn-outline-secondary" type="submit" id="button-razao">Buscar</button>
                </div>
                <div class="input-group mb-3 w-75">
                    <input name="cnpj" type="text" class="form-control" placeholder="Buscar cnpj"
                        aria-label="Buscar cnpj" aria-describedby="button-cnpj" value="{{ old('cnpj') }}">
                    <button class="btn btn-outline-secondary" type="submit" id="button-cnpj">Buscar</button>
                </div>
                <div class="input-group mb-3 w-75">
                    <button class="btn btn-outline-warning" type="button" id="button-limpar">Limpar busca</button>
                </div>
            </div>
        </form>
    </div>
    <div class="d-flex justify-content-center">
        <div class="card w-75">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">Cód</th>
                                <th scope="col">CNPJ</th>
                                <th scope="col">Razão Social</th>
                                <th scope="col">Status</th>
                                <th scope="col">Comprador</th>
                                <th scope="col">RG</th>
                                <th scope="col">CPF</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sacados as $s)
                                <tr @if ($s->status == 2) class="table-danger" @endif>
                                    <th scope="row">{{ $s->codigo_sacado }}</th>
                                    <td>{{ sprintf('%s.%s.%s/%s-%s', substr(str_pad($s->cnpj, 14, '0', STR_PAD_LEFT), 0, 2), substr(str_pad($s->cnpj, 14, '0', STR_PAD_LEFT), 2, 3), substr(str_pad($s->cnpj, 14, '0', STR_PAD_LEFT), 5, 3), substr(str_pad($s->cnpj, 14, '0', STR_PAD_LEFT), 8, 4), substr(str_pad($s->cnpj, 14, '0', STR_PAD_LEFT), 12, 2)) }}
                                    </td>
                                    @if (Auth::user()->isAdmin === true)
                                    <td><a href="{{ route('sacado.details', $s->id) }}">{{ $s->razao_social }}</a></td>
                                    @else
                                    <td>{{ $s->razao_social }}</td>
                                    @endif
                                    <td>
                                        @if ($s->status == 2)
                                            Inativo
                                        @else
                                            Ativo
                                        @endif
                                    </td>
                                    <td>{{ $s->comprador_autorizado }}</td>
                                    <td>{{ $s->rg }}</td>
                                    <td>{{ $s->cpf }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $sacados->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('button-limpar').addEventListener('click', function() {
            document.querySelector('input[name="razao"]').value = '';
            document.querySelector('input[name="cnpj"]').value = '';
            document.getElementById('search-form').submit();
        });
    </script>
@endsection