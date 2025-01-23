<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

class TaskManager extends Controller
{
    function listTask(Request $request)
    {
        // Get search query and status filter from the request
        $search = $request->get('search');
        $status = $request->get('status'); 
        
        $tasks = Tasks::query();

        $tasks->where('user_id', auth()->id());

        // Filter tasks by search term
        if ($search) {
            $tasks->where('title', 'like', '%' . $search . '%');
        }

        // Filter tasks by status
        if ($status) {
            $tasks->where('status', $status);
        }

        $tasks = $tasks->get();

        return view('welcome', compact('tasks'));
    }


    //To show add Task form
    function addTask()
    {
        return view('tasks.add');
    }
    
    //Handle the form submission for adding task
    function addTaskPost(Request  $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required|date',
        ]);
        
        $task = new Tasks();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->deadline = $request->deadline;
        $task->user_id = auth()->id();

        if($task->save()){
            return redirect(route('home'))
                ->with("success", "Task Added Sucessfully");
        }
        return redirect(route('task.add'))
            ->with("error", "Task Not Added");
    }

    //To update the status of the task
    function updateTaskStatus($id)
    {
        $task = Tasks::where('id', $id)->where('user_id', auth()->id())->first();
        if ($task) {
            $task->status = 'completed';
            $task->save();
    
            return redirect(route('home'))
                ->with("success", "Task Completed Successfully");
        }
    
        return redirect(route('home'))
            ->with("error", "Task Not Found or Not Updated");
    }

    //to show the update form
    function editTask($id)
    {
        $task = Tasks::where('id', $id)->where('user_id', auth()->id())->first();
        if (!$task) {
            return redirect(route('home'))->with('error', 'Task not found.');
        }
        return view('tasks.edit', compact('task'));
    }

    //Handle the form submission for updating task
    function updateTask(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required|date',
        ]);

        $task = Tasks::where('id', $id)->where('user_id', auth()->id())->first();
        if ($task) {
            $task->title = $request->title;
            $task->description = $request->description;
            $task->deadline = $request->deadline;

            if ($task->save()) {
                return redirect(route('home'))->with('success', 'Task updated successfully.');
            }
        }
        return redirect(route('home'))->with('error', 'Task update failed.');
    }

    //To delete the task
    function deleteTask($id)
    {
        $task = Tasks::where('id', $id)->where('user_id', auth()->id())->first();
        if ($task) {
            $task->delete();
            return redirect(route('home'))->with('success', 'Task deleted successfully.');
        }
        return redirect(route('home'))->with('error', 'Task not found or not deleted.');
    }

    
}
