<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskManager;
use App\Http\Controllers\AuthManager;

//Home Page
//Route::get('/', [TaskManager::class, 'listTask'])
   // ->name('home');

//Login Page view
Route::get('login', [AuthManager::class, 'login'])
    ->name('login');

//To Login form
Route::post('login', [AuthManager::class, 'loginPost'])
    ->name('login.post');

//register page view
Route::get('register', [AuthManager::class, 'register'])
    ->name('register');

//To register form
Route::post('register', [AuthManager::class, 'registerPost'])
    ->name('register.post');

//logout
Route::get('logout', [AuthManager::class, 'logout'])
    ->name('logout');

//login required routes
Route::middleware('auth')->group(function () {

    Route::get('/', [TaskManager::class, 'listTask'])
        ->name('home');

    //list all tasks
    //Route::get('tasks/list', [TaskManager::class, 'listTask'])
        //->name('task.list');

    //Add Task Form view
    Route::get('task/add', [TaskManager::class, 'addTask'])
        ->name('task.add');
    
    //Add Task
    Route::post('task/add', [TaskManager::class, 'addTaskPost'])
    ->name('task.add.post');

    //Update Task Status
    Route::get('task/status/{id}', [TaskManager::class, 'updateTaskStatus'])
        ->name('task.status.update');

    //Edit Task
    Route::get('task/edit/{id}', [TaskManager::class, 'editTask'])
        ->name('task.edit');

    //Update Task
    Route::post('task/update/{id}', [TaskManager::class, 'updateTask'])
        ->name('task.update');

    //Delete Task
    Route::get('task/delete/{id}', [TaskManager::class, 'deleteTask'])
        ->name('task.delete');

    //list of task
    Route::get('/tasks', [TaskManager::class, 'listTask'])
        ->name('task.list');
    
});






