<?php



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pilotoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/',function(){return response()->json(['Sucesso'=>true]);});
Route::get('/piloto',[pilotoController::class,'index']);
//falta testa-> busca id, deletar e o alterar.
Route::get('/piloto/{codigo}',[pilotoController::class,'show']);
Route::post('/piloto',[pilotoController::class,'store']);
Route::put('/piloto/{codigo}',[pilotoController::class,'update']);
Route::delete('/piloto/{id}',[pilotoController::class,'destroy']);


Route::get('/',function(){return response()->json(['Sucesso'=>true]);});
Route::get('/equipe',[equipeController::class,'index']);
//falta testa-> busca id, deletar e o alterar.
Route::get('/equipe/{codigo}',[equipeController::class,'show']);
Route::post('/equipe',[equipeController::class,'store']);
Route::put('/equipe/{codigo}',[equipeController::class,'update']);
Route::delete('/equipe/{id}',[equipeController::class,'destroy']);