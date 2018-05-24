<?php

use App\Task;
use App\Project;
use \App\Events\TaskCreated; 

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

Route::get('/update', function () {
	Task::dispatch();
});

Route::get('/projects/{project}', function (Project $project) {
    $tasks = $project->load('tasks');

    $projectId = $project->id;
    
    return view('projects.show', compact('tasks','project', 'projectId'));
});

Auth::routes();

Route::get('/home', 'HomeController@Index')->name('home');

Route::get('/api/projects/{project}', function (Project $project) {

    // dd($project->tasks->pluck('body'));
    $tasks = $project->tasks->pluck('body');

    // dd($project);

    $projectId = $project->id;
    
    
    return view('projects.show', compact('tasks', 'project', 'projectId'));
    // return $tasks;
});

Route::post('/api/projects/{project}/tasks', function (Project $project) {

    dd($project->tasks()->create(request(['body'])));
    $task = $project->tasks()->create(request(['body']));

    
    $e = new TaskCreated($task);

    event($e);

    return $task;
});
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::post('/login', 'SessionsController@login');
Route::get('/logout', 'SessionsController@logout');
// Route::get('/home', 'SessionsController@home');
