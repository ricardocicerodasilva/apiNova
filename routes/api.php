<?php



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PilotoController;

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
Route::get('/equipe',[equipeController::class,'index']);
//falta testa-> busca id, deletar e o alterar.
Route::get('/equipe/{id}',[equipeController::class,'show']);
Route::post('/equipe',[equipeController::class,'store']);
Route::put('/equipe/{id}',[equipeController::class,'update']);
Route::delete('/equipe/{id}',[equipeController::class,'destroy']);