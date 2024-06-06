<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index() : View
    {
        $tasks = auth()->user()->role === 1 ? Task::all() : auth()->user()->tasks;

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $users = User::where('role', '0')->get();

        return view('tasks.create', compact('users'));
    }

    public function store(StoreRequest $request)
    {

    }

}
