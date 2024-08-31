<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

use App\Models\piloto;

class EquipeController extends Controller
{
   
    //construir o crud.
    
    //Mostrar todos os registros da tabela equipe
    //Crud -> Read(leitura) Select/Visualizar

    public function index(){
        $regBook = equipe::All();
        $contador = $regBook->count();

        return 'equipes: '.$contador.$regBook.Response()->json([],Response::HTTP_NO_CONTENT);
    }
    //Mostrar um tipo de registro especifico
    //Crud -> Read(leitura) Select/Visualizar
    //A função show busca a id e retorna se o livros foram localizados por id.

    public function show(string $id){ 
        $regBook = equipe::find($id);

        if($regBook){
            return 'equipe localizada: '.$regBook.Response()->json([],Response::HTTP_NO_CONTENT);
        }else{
            return 'equipe não localizada. '.Response()->json([],Response::HTTP_NO_CONTENT);
        }
    }

    //Cadastrar registros
    //Crud -> Create(criar/cadastrar)
    public function store(Request $request){
        $regBook = $request->All();

        $regVerifq = Validator::make($regBook,[
            'idEquipe'=>'required',
            'nomeEquipe'=>'required',
            'logo'=>'required'
        ]);

        if($regVerifq->fails()){
            return 'Registros Invalidos: '.Response()->json([],Response::HTTP_NO_CONTENT);

        }
        $regBookCad = tbllivros::create($regBook);

        if( $regBookCad){
            return 'Equipe cadastrada: '.Response()->json([],Response::HTTP_NO_CONTENT);

        }else{
            return 'Equipe não cadastrada: '.Response()->json([],Response::HTTP_NO_CONTENT);

        }

    }

    //Alterar registros
    //Crud -> update(alterar)
    public function update(Request $request,string $id){

        $regBook = $request->All();

        $regVerifq = Validator::make($regBook,[
           'idEquipe'=>'required',
            'nomeEquipe'=>'required',
            'logo'=>'required'
        ]);
        if($regVerifq->fails()){
            return 'Registros não atualizados: '.Response()->json([],Response::HTTP_NO_CONTENT);

        }
        $regBookBanco = equipe::Find($id);
        $regBookBanco->idPiloto = $regBook['idPiloto'];
        $regBookBanco->nomePiloto = $regBook['nomePiloto'];
        $regBookBanco->idadePiloto = $regBook['idadePiloto'];

        $retorno = $regBookBanco->save();

        if($retorno){
            return "equipe atualizada com sucesso.".Response()->json([],Response::HTTP_NO_CONTENT);
        }else{
            return "Atenção... Erro: equipe não atualizado".Response()->json([],Response::HTTP_NO_CONTENT);
        }

    }

    //Deletar os registros
    //Crud -> delete(apagar)
    public function destroy(string $id){

    $regBook = equipe::Find($id);

    if($regBook->delete()){   
    return "A equipe foi deletado com sucesso".response()->json([],Response::HTTP_NO_CONTENT);
    }

    return "Algo deu errado: equipe não deletado".response()->json([],Response::HTTP_NO_CONTENT);
    }

    //Crud
    //C reate
    //r ead
    //u pdate
    //d elete

}