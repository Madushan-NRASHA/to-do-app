<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'task' => 'required|max:100|min:5',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // If validation passes, create and save the task
        $task = new Task;
        $task->task = $request->input('task');
        $task->save();
        
        // Redirect back to the task list or any other appropriate page
        return redirect()->route('task.index')->with('success', 'Task created successfully');
    }

    public function index()
    {
        // Retrieve all tasks
        $tasks = Task::all();

        // Return a view with the tasks data
        return view('task', ['tasks' => $tasks]);
    }

    public function updatetask($id)
    {
        $task = Task::findOrFail($id);

        // Update the task status
        $task->iscompleted = !$task->iscompleted; // Toggle the status
    
        // Save the updated task
        $task->save();
    
        // Redirect back to the task list or any other appropriate page
        return redirect()->route('task.index')->with('success', 'Task status updated successfully');
    }
    public function deletetask($id)
    {
        $task = Task::findOrFail($id);

        // Delete the task
        $task->delete();
        return redirect()->route('task.index')->with('success', 'Task status updated successfully');
    }
    public function updatetview($id)
    {
        $task = Task::findOrFail($id);
    
        // Update the task status
        $task->iscompleted = !$task->iscompleted; // Toggle the status
    
        // Save the updated task
        $task->save();
    
        // Redirect back to the task list or any other appropriate page
        return view('updatetview')->with('taskdata',$task);

    }
    
    public function updatetasks(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'task-name' => 'required|max:100|min:5',
        ]);
    
        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $id = $request->id;
    
        $taskName = $request->input('task-name'); // Get the task name from the request
    
        $data = Task::findOrFail($id);
    
        // Update the task name
        $data->task = $taskName; // Assuming 'task' is the field name in your Task model
    
        // Save the updated task
        $data->save();
    
        // Retrieve all tasks after updating
        $tasks = Task::all();
    
        // Return the view with the updated tasks data
        return view('task', ['tasks' => $tasks]);
    }
    
}