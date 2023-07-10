<?php

namespace App\Http\Controllers;

use App\Models\Sacado;
use Illuminate\Http\Request;

class SacadoController extends Controller
{
    public function list(){

        $sacados = Sacado::paginate(10);

        return view('sacados.list', compact('sacados'));
    }

    public function details(Sacado $sacado){
        
        return view('sacados.details', compact('sacado'));
    }

    public function create(){
        return view('sacados.create');
    }

    public function store(Request $request){

        $data = $request->validate([
            'codigo_sacado' => 'required',
            'cnpj' => 'required',
            'razao_social' => 'required',
            'tipo_inscricao' => 'required',
            'cep' => 'required',
            'endereco' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required',
            'numero' => 'required',
            'complemento' => 'nullable',
            'ddd_telefone' => 'required',
            'ramal' => 'nullable',
            'nome_contato' => 'required',
            'email' => 'required|email',
            'status' => 'required',
            'comprador_autorizado' => 'required',
            'rg' => 'required',
            'orgao_emissor' => 'required',
            'uf_emissor' => 'required',
            'cpf' => 'required',
            'cargo' => 'required',
        ]);

        Sacado::create($data);

        return redirect()->back()->with('status', 'Cadastrado com sucesso!');
    }

    public function update(Request $request){
        
        $data = $request->validate([
            'codigo_sacado' => 'required',
            'cnpj' => 'required',
            'razao_social' => 'required',
            'tipo_inscricao' => 'required',
            'cep' => 'required',
            'endereco' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required',
            'numero' => 'required',
            'complemento' => 'nullable',
            'ddd_telefone' => 'required',
            'ramal' => 'nullable',
            'nome_contato' => 'required',
            'email' => 'required|email',
            'status' => 'required',
            'comprador_autorizado' => 'required',
            'rg' => 'required',
            'orgao_emissor' => 'required',
            'uf_emissor' => 'required',
            'cpf' => 'required',
            'cargo' => 'required',
        ]);
        $sacado = Sacado::find($request->codigo_sacado);
        $sacado->update($data);
        $sacado->save();

        return redirect()->back()->with('status', 'Atualizado com sucesso!');
    }
}
