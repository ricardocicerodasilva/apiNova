<?php



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PilotoController;
use App\Http\Controllers\EquipeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/',function(){return response()->json(['Sucesso'=>true]);});
Route::get('/piloto',[PilotoController::class,'index']);
//falta testa-> busca id, deletar e o alterar.
Route::get('/piloto/{id}',[PilotoController::class,'show']);
Route::post('/piloto',[PilotoController::class,'store']);
Route::put('/piloto/{id}',[PilotoController::class,'update']);
Route::delete('/piloto/{id}',[PilotoController::class,'destroy']);


Route::get('/',function(){return response()->json(['Sucesso'=>true]);});
Route::get('/equipe',[EquipeController::class,'index']);
//falta testa-> busca id, deletar e o alterar.
Route::get('/equipe/{id}',[EquipeController::class,'show']);
Route::post('/equipe',[EquipeController::class,'store']);
Route::put('/equipe/{id}',[EquipeController::class,'update']);
Route::delete('/equipe/{id}',[EquipeController::class,'destroy']);