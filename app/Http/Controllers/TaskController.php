<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreTaskRequest;

class TaskController extends Controller
{
    public function index(): Response
    {
        $tasks = Task::with('user')->get();

        return Inertia::render('Tasks/Index', compact('tasks'));
    }

    public function create(): Response
    {
        $users = User::select(['id', 'name'])->pluck('name', 'id');

        return Inertia::render('Tasks/Create', compact('users'));
    }

    public function store(StoreTaskRequest $request): RedirectResponse
    {
        Task::create($request->validated());

        return redirect()->route('tasks.index')
            ->with('message', __('Task created successfully'));
    }

    public function edit(Task $task): Response
    {
        $users = User::select(['id', 'name'])->pluck('name', 'id');

        return Inertia::render('Tasks/Edit', compact('task', 'users'));
    }

    public function update(Task $task, UpdateTaskRequest $request): RedirectResponse
    {
        $task->update($request->validated());

        return redirect()->route('tasks.index')
            ->with('message', __('Task updated successfully'));
    }

    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('message', __('Task deleted successfully'));
    }
}
