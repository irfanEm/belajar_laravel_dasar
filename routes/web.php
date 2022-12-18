<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\ResponseController;

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

Route::post('/input/filter/only', [InputController::class, 'inputFilterOnly']);

Route::post('/input/filter/except', [InputController::class, 'inputFilterExcept']);

Route::post('/input/filter/merge', [InputController::class, 'inputFilterMerge']);

Route::post('/file/upload', [FileController::class, 'upload']);

Route::get('/response/halo',[ResponseController::class, 'response']);

Route::get('/response/header', [ResponseController::class, 'header']);

Route::get('/response/view', [ResponseController::class, 'responseView']);
Route::get('/response/json', [ResponseController::class, 'jsonResponse']);
Route::get('/response/file', [ResponseController::class, 'fileResponse']);
Route::get('/response/download', [ResponseController::class, 'fileDownloadResponse']);

Route::get('/cookie/set', [CookieController::class, 'Cookieset']);
Route::get('/cookie/get', [CookieController::class, 'getCookie']);
Route::get('/cookie/clear', [CookieController::class, 'clearCookie']);
