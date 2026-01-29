<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Inertia\Inertia;
use Inertia\Response;

class TaskPageController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Tasks/Index', [
            'tasks' => Task::paginate(10),
        ]);
    }
}
