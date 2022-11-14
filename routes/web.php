<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function (){
    return"world";
});

Route::fallback(function(){
    return "404 Not Found by Irfan Em";
});

Route::view('/halo', 'halo', ['nama'=>'irfan machmud']);

Route::get('/halo2', function(){
    return view('halo', ['nama'=>'irfan Machmud']);
});

Route::get('/halo3', function(){
    return view('halo.dunia', ['nama'=>'irfan Machmud']);
});

Route::get('/produks/{id}', function($idProduk)
{
    return "Produk : ".$idProduk;
});

Route::get('/irfan/{machmud}/machmud/{irfan}',function($machmud, $irfan)
{
    return "nama akhir : ".$machmud.", nama awal : ".$irfan;
});

Route::get('/item/{id}', function($IdItem){
    return "item : ".$IdItem;
})->where('id', '[1-9]+');

Route::get('/produk/{id?}', function($produkID = '27'){
    return "produk id: ".$produkID;
});

Route::get('/conflict/machmud',function(){
    return "nama irfan machmud";
});

Route::get('/conflict/{nama}', function($nama){
    return "nama ".$nama;
});

Route::get('/controller/hello/request', [HelloController::class, 'request']);

Route::get('/controller/hello/{name}', [HelloController::class]);

Route::get('/input/hello', [InputController::class, 'hello']);

Route::post('/input/hello', [InputController::class, 'hello']);

Route::post('/input/hello/first', [InputController::class, 'helloNested']);

Route::post('/input/hello/last', [InputController::class, 'helloNested2']);

Route::post('/input/hello/input', [InputController::class, 'helloInput']);

Route::post('/input/hello/array', [InputController::class, 'helloArray']);

Route::post('/input/type', [InputController::class, 'inputType']);
