<?php

namespace NetPortal\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use NetPortal\User;
use NetPortal\Tasks;
use NetPortal\Http\Requests;
use NetPortal\Http\Controllers\Controller;
use NetPortal\Http\Requests\CreateTaskRequest;

class TasksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Require authentication on our tasks page
        $this->middleware('auth');
    }

    public function index()
    {
        // Retrieve all tasks that are to be completed
        // and sort by latest first
        $tasks = Tasks::latest()
        ->where('completed', '=', false)
        ->get();

        // Fetch the number of to-do tasks
        $tasksCount = Tasks::where('completed', '=', false)->count();

        // Fetch all completed tasks
        $completedTasks = Tasks::latest()
        ->where('completed', '=', true)
        ->get();

        // Fetch the number of completed tasks
        $completedCount = Tasks::where('completed', '=', true)->count();

        return view(
            'tasks.index', compact(
                'tasks',
                'tasksCount',
                'completedTasks',
                'completedCount'
            )
        );
    }

    public function show($id)
    {
        $task = Tasks::findOrFail($id);

        return view('tasks.single', compact('task'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(CreateTaskRequest $request)
    {
        // Assign the creator's id to reference in the tasks table
        $request['user_id'] = Auth::user()->id;
        $request['completed'] = false;

        Tasks::create($request->all());

        return redirect('tasks');
    }

    public function edit($id)
    {
        $task = Tasks::findOrFail($id);

        return view('tasks.edit', compact('task'));
    }

    public function update($id)
    {
        Tasks::findOrFail($id)->update(['completed' => true]);

        return redirect('tasks');
    }
}
