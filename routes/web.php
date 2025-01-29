<?php

use Illuminate\Support\Facades\Route;
use \App\Models\Task;

//HomePage
Route::get('/', function () {
    return view('index', [
        'tasks' => Task::latest()->paginate(5)
    ]);
})->name('index');


//Add New Task Form
Route::get('/tasks/create', function() {
   return view('create');
})->name('tasks.create');

//Save Task
Route::post('/tasks/store', function() {
    request()->validate(
        [
            'title' => 'string|max:200|required',
            'description' => 'string|required',
            'long_description' => 'string|required',
            'completed' => 'required'
        ]
    );

    Task::create(request()->all());

    return redirect()->route('index')->with('success', 'Task has been added to the list');
})->name('tasks.store');

//Show single task
Route::get('/task/{id}', function($id) {

    return view('show', [
        'task' => \App\Models\Task::findOrFail($id)
    ]);
})->name('tasks.show');

//Task Edit Form
Route::get('task/{id}/edit', function($id) {
    $task = \App\Models\Task::findOrFail($id);

    return view('edit', [
        'task' => $task
    ]);
})->name('tasks.edit');

//Update Task
Route::put('tasks/{id}/update', function($id) {

    $task = \App\Models\Task::findOrFail($id);

    request()->validate(
        [
            'title' => 'string|max:200|required',
            'description' => 'string|required',
            'long_description' => 'string|required',
            'completed' => 'required'
        ]
    );

   $task->title = request()->title;
   $task->description = request()->description;
   $task->long_description = request()->long_description;
   $task->completed = request()->completed;
   $task->save();

   return redirect()->route('tasks.edit',['id' => $task->id])->with('success', 'Task has been updated');
})->name('tasks.update');

Route::fallback(function () {
    return 'This is the fallback route';
});
