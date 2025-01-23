<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskManager;
use App\Http\Controllers\AuthManager;

// Redirect root `/` to the login page if the user is not authenticated
Route::get('/', function () {
    return redirect()->route('login');
})->name('landing');

//Login Page view
Route::get('login', [AuthManager::class, 'login'])
    ->name('login');

//To Login form
Route::post('login', [AuthManager::class, 'loginPost'])
    ->name('login.post');

//Register page view
Route::get('register', [AuthManager::class, 'register'])
    ->name('register');

//To Register form
Route::post('register', [AuthManager::class, 'registerPost'])
    ->name('register.post');

//Logout
Route::get('logout', [AuthManager::class, 'logout'])
    ->name('logout');

//Login-required routes
Route::middleware('auth')->group(function () {

    //Home Page
    Route::get('/home', [TaskManager::class, 'listTask'])
        ->name('home');

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

    //List of tasks
    Route::get('/tasks', [TaskManager::class, 'listTask'])
        ->name('task.list');
});







