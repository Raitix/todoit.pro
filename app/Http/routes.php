<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {

    $todos = \App\Todo::all();

    return view('todo', ['todos' => $todos]);
});

$app->post('/create-todo', 'TodoController@createTodo');


// BEGIN ajax rpcs

$app->post('/change-status', 'TodoController@changeStatus');

// END ajax rpcs