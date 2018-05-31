<?php

use App\Task;
use App\Project;
use App\Events\TaskCreated;
use App\User;
use App\Room;
use Illuminate\Support\Facades\Auth;

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

    // $projectId = md5(Auth::user()->id);
    
    return view('projects.show', compact('tasks','project', 'projectId'));
});

Auth::routes();

Route::get('/home', 'HomeController@Index')->name('home');

Route::get('/api/projects/{project}', function (Project $project) {

    $user = Auth::user();
    // $room = $user->room()->firstOrCreate(['user_id' => Auth::user()->id]);

    // dd($room->room_id);

    // dd($project->tasks->pluck('body'));
    $tasks = $project->tasks->pluck('body');

    $chanId = sha1(Auth::user()->id);
    
    return view('projects.show', compact('tasks', 'project', 'chanId'));
    // return $tasks;
});

Route::post('/api/projects/{projectId}/tasks', function (Project $project, $projectId) {

    $message = request(['body']);
    
    $p = new App\Project;
    $project = $p->find($projectId);

    
    
    $task = $project->tasks()->create($message);
    $userid = Auth::user()->id;
    $chanId = sha1($userid);
    logger($chanId);
    // dd();
    
    event(new TaskCreated($message, $chanId));

    logger($task);

    return $message;
});
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::post('/login', 'SessionsController@login');
Route::get('/logout', 'SessionsController@logout');
// Route::get('/home', 'SessionsController@home');

Route::get('/chat', 'ChatController@index');
Route::get('/chat/{id}', 'ChatController@show');
Route::post('/chat/send', 'ChatController@create');
Route::post('/chat/delete', 'ChatController@delete');

Route::get('/rooms', function () {
    
    $user = Auth::user();

    // $rooms = $user->rooms()->get();

    // dd($user->rooms->get());
    
    return view('rooms', compact('user'));
});

Route::get('/rooms/save/{name}', function ($name) {
    
    dd($name);
    // $name = md5(rand(1, 50)); 
    $user = Auth::user();
    $user->rooms()->name = $request->name;
    $user->rooms()->room_id = 1;
    $user->rooms()->user_id = 1;
    $user->rooms()->save($user);    
});

