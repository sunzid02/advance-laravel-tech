<?php

use App\Postcard;
use App\PostcardSendingService;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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
    dd( Str::partNumber('3214568785645646', 'zia') );

    return Response::errorJson('Huge error occured');
    return view('welcome');
});

Route::get('pay', 'PayOrderController@store');

Route::get('channels', 'ChannelController@index');
Route::get('posts/create', 'PostController@create');

Route::get('postcards', function () {

    $postcardService = new PostcardSendingService('US', 4, 6);

    $postcardService->hello('my  message', 'test@test.com');

});

//by using facade
Route::get('facades', function () {

    Postcard::hello('my  message', 'test@test.com');

});

//pipelines
Route::get('pipelines', 'NewPostController@index');