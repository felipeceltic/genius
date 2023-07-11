@extends('layouts.app')
@section('title')
    {{$sacado->razao_social}}
@endsection
@section('head.scripts')
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- jQuery Mask Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <!-- ViaCEP -->
    <script>
        $(document).ready(function() {
            $('#cep').blur(function() {
                var cep = $(this).val().replace(/\D/g, '');

                if (cep !== '') {
                    $.getJSON(`https://viacep.com.br/ws/${cep}/json/`, function(data) {
                        if (!("erro" in data)) {
                            $('#endereco').val(data.logradouro);
                            $('#bairro').val(data.bairro);
                            $('#cidade').val(data.localidade);
                            $('#uf').val(data.uf);
                        } else {
                            alert('CEP não encontrado.');
                        }
                    });
                }
            });
        });
    </script>
@endsection
@section('content')
    <div class="d-flex justify-content-center">
        <div class="container overflow-hidden text-center w-75 mb-3">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('sacado.update') }}">
                @csrf
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <label for="codigo_sacado" class="form-label">Código do Sacado</label>
                        <input name="codigo_sacado" type="text" class="form-control" id="codigo_sacado" value="{{$sacado->codigo_sacado}}" required autofocus>
                        <input type="hidden" name="id_sacado" value="{{$sacado->id}}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="cnpj" class="form-label">CNPJ</label>
                        <input name="cnpj" type="text" class="form-control" id="cnpj" data-mask="00.000.000/0000-00" value="{{$sacado->cnpj}}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="razao_social" class="form-label">Razão Social</label>
                        <input name="razao_social" type="text" class="form-control" id="razao_social" value="{{$sacado->razao_social}}" required>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label for="tipo_inscricao" class="form-label">Tipo de Inscrição</label>
                        <select name="tipo_inscricao" class="form-select" id="tipo_inscricao" required>
                            <option value="">Selecione...</option>
                            @if ($sacado->tipo_inscricao == 1)<option value="1" selected>ATIVA</option>@else <option value="1">ATIVA</option> @endif
                            @if ($sacado->tipo_inscricao == 2)<option value="2" selected>INATIVA</option>@else <option value="2">INATIVA</option> @endif
                            @if ($sacado->tipo_inscricao == 3)<option value="3" selected>ISENTO</option>@else <option value="3">ISENTO</option> @endif
                        </select>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label for="cep" class="form-label">CEP</label>
                        <input name="cep" type="text" class="form-control" id="cep" data-mask="00000-000" value="{{$sacado->cep}}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input name="endereco" type="text" class="form-control" id="endereco" value="{{$sacado->endereco}}" required>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label for="bairro" class="form-label">Bairro</label>
                        <input name="bairro" type="text" class="form-control" id="bairro" value="{{$sacado->bairro}}" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="cidade" class="form-label">Cidade</label>
                        <input name="cidade" type="text" class="form-control" id="cidade" value="{{$sacado->cidade}}" required>
                    </div>

                    <div class="col-md-1 mb-3">
                        <label for="uf" class="form-label">UF</label>
                        <input name="uf" type="text" class="form-control" id="uf" value="{{$sacado->uf}}" required>
                    </div>

                    <div class="col-md-1 mb-3">
                        <label for="numero" class="form-label">Número</label>
                        <input name="numero" type="text" class="form-control" id="numero" value="{{$sacado->numero}}" required>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label for="complemento" class="form-label">Complemento</label>
                        <input name="complemento" type="text" class="form-control" id="complemento" value="{{$sacado->complemento}}">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="ddd_telefone" class="form-label">DDD + Telefone</label>
                        <input name="ddd_telefone" type="text" class="form-control" id="ddd_telefone" data-mask="(00) 0000-0000" value="{{$sacado->ddd_telefone}}" required>
                    </div>

                    <div class="col-md-1 mb-3">
                        <label for="ramal" class="form-label">Ramal</label>
                        <input name="ramal" type="text" class="form-control" id="ramal" value="{{$sacado->ramal}}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="nome_contato" class="form-label">Nome do Contato</label>
                        <input name="nome_contato" type="text" class="form-control" id="nome_contato" value="{{$sacado->nome_contato}}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="text" class="form-control" id="email" value="{{$sacado->email}}" >
                    </div>

                    <div class="col-md-2 mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-select" id="status" required>
                            <option value="">Selecione...</option>
                            @if ($sacado->status == 1)<option value="1" selected>Ativo</option>@else <option value="1">Ativo</option> @endif
                            @if ($sacado->status == 2)<option value="2" selected>Inativo</option>@else <option value="2">Inativo</option> @endif
                        </select>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="comprador_autorizado" class="form-label">Comprador Autorizado</label>
                        <input name="comprador_autorizado" type="text" class="form-control" id="comprador_autorizado" value="{{$sacado->comprador_autorizado}}">
                    </div>

                    <div class="col-md-2 mb-3">
                        <label for="rg" class="form-label">Nº RG</label>
                        <input name="rg" type="text" class="form-control" id="rg" value="{{$sacado->rg}}">
                    </div>

                    <div class="col-md-1 mb-3">
                        <label for="orgao_emissor" class="form-label">Emissor</label>
                        <input name="orgao_emissor" type="text" class="form-control" id="orgao_emissor" value="{{$sacado->orgao_emissor}}">
                    </div>

                    <div class="col-md-2">
                        <label for="uf_emissor" class="form-label text-nowrap">UF Emissor</label>
                        <select class="form-select" id="uf_emissor" name="uf_emissor">
                          @php
                            $ufs = ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO'];
                          @endphp
                        
                          @foreach ($ufs as $uf)
                            <option value="{{ $uf }}" @if ($sacado->uf_emissor == $uf || old('uf_emissor') == $uf) selected @endif>{{ $uf }}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label for="cpf" class="form-label">CPF</label>
                        <input name="cpf" type="text" class="form-control" id="cpf" data-mask="000.000.000-00" value="{{$sacado->cpf}}">
                    </div>

                    <div class="col-md-2 mb-3">
                        <label for="cargo" class="form-label">Cargo</label>
                        <input name="cargo" type="text" class="form-control" id="cargo" value="{{$sacado->cargo}}">
                    </div>
                </div>
                <button type="submit" class="btn btn-success w-50">Atualizar</button>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Aplica as máscaras nos campos
            $('#cnpj').mask('00.000.000/0000-00');
            $('#cep').mask('00000-000');
            $('#ddd_telefone').mask('(00) 0000-0000');
            $('#cpf').mask('000.000.000-00');
        });
    </script>
@endsection