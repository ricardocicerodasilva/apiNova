<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

use App\Models\piloto;

class PilotoController extends Controller
{
    //construir o crud.
    
    //Mostrar todos os registros da tabela piloto
    //Crud -> Read(leitura) Select/Visualizar

    public function index(){
        $regBook = piloto::All();
        $contador = $regBook->count();

        return 'pilotos: '.$contador.$regBook.Response()->json([],Response::HTTP_NO_CONTENT);
    }
    //Mostrar um tipo de registro especifico
    //Crud -> Read(leitura) Select/Visualizar
    //A função show busca a id e retorna se o livros foram localizados por id.

    public function show(string $id){ 
        $regBook = piloto::find($id);

        if($regBook){
            return 'piloto localizado: '.$regBook.Response()->json([],Response::HTTP_NO_CONTENT);
        }else{
            return 'piloto não localizado. '.Response()->json([],Response::HTTP_NO_CONTENT);
        }
    }

    //Cadastrar registros
    //Crud -> Create(criar/cadastrar)
    public function store(Request $request){
        $regBook = $request->All();

        $regVerifq = Validator::make($regBook,[
            'idPiloto'=>'required',
            'nomePiloto'=>'required',
            'idadePiloto'=>'required'
        ]);

        if($regVerifq->fails()){
            return 'Registros Invalidos: '.Response()->json([],Response::HTTP_NO_CONTENT);

        }
        $regBookCad = piloto::create($regBook);

        if( $regBookCad){
            return 'piloto cadastrado: '.Response()->json([],Response::HTTP_NO_CONTENT);

        }else{
            return 'piloto não cadastrado: '.Response()->json([],Response::HTTP_NO_CONTENT);

        }

    }

    //Alterar registros
    //Crud -> update(alterar)
    public function update(Request $request,string $id){

        $regBook = $request->All();

        $regVerifq = Validator::make($regBook,[
          'idPiloto'=>'required',
            'nomePiloto'=>'required',
            'idadePiloto'=>'required'
        ]);

        if($regVerifq->fails()){
            return 'Registros não atualizados: '.Response()->json([],Response::HTTP_NO_CONTENT);

        }
        $regBookBanco = piloto::Find($id);
        $regBookBanco->idPiloto = $regBook['idPiloto'];
        $regBookBanco->nomePiloto = $regBook['nomePiloto'];
        $regBookBanco->idadePiloto = $regBook['idadePiloto'];

        $retorno = $regBookBanco->save();

        if($retorno){
            return "piloto atualizado com sucesso.".Response()->json([],Response::HTTP_NO_CONTENT);
        }else{
            return "Atenção... Erro: piloto não atualizado".Response()->json([],Response::HTTP_NO_CONTENT);
        }

    }

    //Deletar os registros
    //Crud -> delete(apagar)
    public function destroy(string $id){

    $regBook = piloto::Find($id);

    if($regBook->delete()){   
    return "O piloto foi deletado com sucesso".response()->json([],Response::HTTP_NO_CONTENT);
    }

    return "Algo deu errado: piloto não deletado".response()->json([],Response::HTTP_NO_CONTENT);
    }

    //Crud
    //C reate
    //r ead
    //u pdate
    //d elete

}