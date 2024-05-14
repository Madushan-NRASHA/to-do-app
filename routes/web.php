<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Route::get('/', function () {
//     return view('task');
// });

Route::get('/', [TaskController::class, 'index'])->name('task.index');
Route::post('/savetask', [TaskController::class, 'store'])->name('task.store');
Route::get('/markcompleted/{id}', [TaskController::class, 'updatetask'])->name('task.markcompleted');
Route::get('/deletetask/{id}', [TaskController::class, 'deletetask'])->name('task.delete');
Route::get('/tasks/{id}/update-view', [TaskController::class, 'updatetview'])->name('task.updatetview');
Route::post('/updatetasks', [TaskController::class, 'updatetasks'])->name('task.updatetasks');





