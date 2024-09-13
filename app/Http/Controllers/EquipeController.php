<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

use App\Models\Equipe;

class EquipeController extends Controller
{
   
    //construir o crud.
    
    //Mostrar todos os registros da tabela Equipe
    //Crud -> Read(leitura) Select/Visualizar

    public function index(){
        $regBook = Equipe::All();
        $contador = $regBook->count();

        return 'Equipe: '.$contador.$regBook.Response()->json([],Response::HTTP_NO_CONTENT);
    }
    //Mostrar um tipo de registro especifico
    //Crud -> Read(leitura) Select/Visualizar
    //A função show busca a id e retorna se o livros foram localizados por id.

    public function show(string $id){ 
        $regBook = Equipe::find($id);

        if($regBook){
            return 'Equipe localizada: '.$regBook.Response()->json([],Response::HTTP_NO_CONTENT);
        }else{
            return 'Equipe não localizada. '.Response()->json([],Response::HTTP_NO_CONTENT);
        }
    }

    //Cadastrar registros
    //Crud -> Create(criar/cadastrar)
    public function store(Request $request){
        $regBook = $request->All();

        $regVerifq = Validator::make($regBook,[
            
            'nomeEquipe'=>'required',
            'logo'=>'required'
        ]);

        if($regVerifq->fails()){
            return 'Registros Invalidos: '.Response()->json([],Response::HTTP_NO_CONTENT);

        }
        $regBookCad = Equipe::create($regBook);

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
           
            'nomeEquipe'=>'required',
            'logo'=>'required'
        ]);
        if($regVerifq->fails()){
            return 'Registros não atualizados: '.Response()->json([],Response::HTTP_NO_CONTENT);

        }
        $regBookBanco = Equipe::find($id);
       
        $regBookBanco->nomeEquipe = $regBook['nomeEquipe'];
        $regBookBanco->logo= $regBook['logo'];

        $retorno = $regBookBanco->save();

        if($retorno){
            return "Equipe atualizada com sucesso.".Response()->json([],Response::HTTP_NO_CONTENT);
        }else{
            return "Atenção... Erro: Equipe não atualizado".Response()->json([],Response::HTTP_NO_CONTENT);
        }

    }

    //Deletar os registros
    //Crud -> delete(apagar)
    public function destroy(string $id){

    $regBook = Equipe::Find($id);

    if($regBook->delete()){   
    return "A Equipe foi deletado com sucesso".response()->json([],Response::HTTP_NO_CONTENT);
    }

    return "Algo deu errado: Equipe não deletado".response()->json([],Response::HTTP_NO_CONTENT);
    }

    //Crud
    //C reate
    //r ead
    //u pdate
    //d elete

}