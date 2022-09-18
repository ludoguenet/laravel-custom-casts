<?php

namespace App\Http\Controllers;

use App\Events\ProjectEvent;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function store(Request $request): View
    {
        $project = Project::create([
            'title' => $request->title,
            'deadline_at' => $request->deadline_at,
            'user_id' => auth()->id(),
        ]);

        Event::dispatch(new ProjectEvent(
            $project->deadline_at,
        ));

        return view('projects.show', [
            'project' => $project,
        ]);
    }
}
