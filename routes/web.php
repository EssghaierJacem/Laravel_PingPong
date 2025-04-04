<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PingPongControleur;
use App\Http\Controllers\TestFlashController;
use App\Http\Controllers\TodoController;
use App\Http\Middleware\CheckTodo;

    Route::get('/', function () {
        return view('welcome', ['titre' => 'Mon premier exemple.']);
    });
    Route::get('/ping', [PingPongControleur::class, 'ping']);  
    Route::get('/pong', [PingPongControleur::class, 'pong']);
    Route::get('/flash', [TestFlashController::class, 'main']);
    Route::post('/traitement', [TestFlashController::class, 'traitement'])->middleware(CheckTodo::class);
    Route::get('/todo', [TodoController::class, 'todo']);
    Route::post('/todo', [TodoController::class, 'addTodo']); 
    Route::get('/todo/terminer/{id}', [TodoController::class, 'markAsDone']);
    Route::get('/todo/index', [TodoController::class, 'index']);
    Route::get('/todo/supprimer/{id}', [TodoController::class, 'deleteTodo']);                 