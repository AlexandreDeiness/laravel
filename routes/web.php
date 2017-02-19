<?php

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



Route::resource('/article', 'ArticleController');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('/user', 'UserController');

//commentaire
//Route::get('/comment', function(){
//    return view('comments.index');
//});
Route::post('/article/{article}/comments', 'CommentController@store');

//images
Route::get('/image', 'ImageController@index');
Route::post('/store', 'ImageController@store');
Route::get('/showall', 'ImageController@showall');
Route::get('/show/{id}', 'ImageController@show');

//like
Route::get('article/like/{id}', ['as' => 'article.like', 'uses' => 'LikeController@likeArticle']);

//contact
Route::get('form-contact', 'ContactController@index');

//EXO1

/*Route::get('/iim', function() {
   return view('exo1.iim');
});


Route::get('/bonjour/{name}', function($name) {
    return view('exo1.bonjour', ['prenom' => $name]);
});

Route::get('/test', function() {
    $age = 15;

    $tasks = [
        'Faire le ménage',
        'Envoyer un mail'
    ];

    return view('exo1.test', compact('age', 'tasks'));
});

Route::get('/page1', function() {
    return view('exo1.page1');
});

Route::get('/page2', function() {
    return view('exo1.page2');
});*/
