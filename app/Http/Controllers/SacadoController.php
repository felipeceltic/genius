<?php

namespace App\Http\Controllers;

use App\Models\Sacado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SacadoController extends Controller
{
    public function list(){

        $sacados = Sacado::orderBy('id', 'desc')->paginate(5);

        return view('sacados.list', compact('sacados'));
    }

    public function search(Request $request){
        
        $request->flash();
        $cnpj = $request->cnpj;
        $cnpj = str_replace(['.', '/', '-'], '', $cnpj);

        if ($request->razao !== null || $cnpj !== null) {
            $sacados = Sacado::orderBy('id', 'desc')
                    ->where('razao_social', 'LIKE', '%' . $request->razao . '%')
                    ->where('cnpj', 'LIKE', '%' . $cnpj . '%')
                    ->paginate(5);
        } else {    
            $sacados = Sacado::orderBy('id', 'desc')->paginate(5);

            return view('sacados.list', compact('sacados'));
        }
        
        return view('sacados.list', compact('sacados'));
    }

    public function details(Sacado $sacado){
        if (Auth::user()->isAdmin !== true) {
            return view('isAdmin.isadmin');
        }
        return view('sacados.details', compact('sacado'));
    }

    public function create(){
        if (Auth::user()->isAdmin !== true) {
            return view('isAdmin.isadmin');
        }
        return view('sacados.create');
    }

    public function store(Request $request){

        $data = $request->validate([
            'codigo_sacado' => 'required',
            'cnpj' => 'required',
            'razao_social' => 'required',
            'tipo_inscricao' => 'nullable',
            'cep' => 'nullable',
            'endereco' => 'nullable',
            'bairro' => 'nullable',
            'cidade' => 'nullable',
            'uf' => 'nullable',
            'numero' => 'nullable',
            'complemento' => 'nullable',
            'ddd_telefone' => 'nullable',
            'ramal' => 'nullable',
            'nome_contato' => 'nullable',
            'email' => 'nullable',
            'status' => 'nullable',
            'comprador_autorizado' => 'nullable',
            'rg' => 'nullable',
            'orgao_emissor' => 'nullable',
            'uf_emissor' => 'nullable',
            'cpf' => 'nullable',
            'cargo' => 'nullable',
        ]);

        Sacado::create($data);

        return redirect()->back()->with('status', 'Cadastrado com sucesso!');
    }

    public function update(Request $request){
        
        $data = $request->validate([
            'codigo_sacado' => 'required',
            'cnpj' => 'required',
            'razao_social' => 'required',
            'tipo_inscricao' => 'nullable',
            'cep' => 'nullable',
            'endereco' => 'nullable',
            'bairro' => 'nullable',
            'cidade' => 'nullable',
            'uf' => 'nullable',
            'numero' => 'nullable',
            'complemento' => 'nullable',
            'ddd_telefone' => 'nullable',
            'ramal' => 'nullable',
            'nome_contato' => 'nullable',
            'email' => 'nullable',
            'status' => 'nullable',
            'comprador_autorizado' => 'nullable',
            'rg' => 'nullable',
            'orgao_emissor' => 'nullable',
            'uf_emissor' => 'nullable',
            'cpf' => 'nullable',
            'cargo' => 'nullable',
        ]);
        $sacado = Sacado::find($request->id_sacado);
        $sacado->update($data);
        $sacado->save();

        return redirect()->back()->with('status', 'Atualizado com sucesso!');
    }
}
