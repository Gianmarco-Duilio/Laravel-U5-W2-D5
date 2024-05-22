<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(4);
        return view('projects.index', ['projects' => $projects]);
    }

    public function store(Request $request)
    {

        $data = $request->all();

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'status' => 'required|string|in:planned,in progress,completed',
        ]);

        $project = new Project();
        $project->title = $data['title'];
        $project->description = $data['description'];
        $project->start_date = $data['start_date'];
        $project->status = $data['status'];
        $project->user_id = $request->user()->id;
        $project->save();

        return redirect()->route('projects.index')->with('create_success', $project);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function show($id)
    {
        $project = Project::find($id);
        return view('projects.show', ['project' => $project]);
    }

    public function edit(Request $request, $id)
    {
        $project = Project::find($id);
        if ($request->user()->id !== $project->user_id) abort(401);

        return view('projects.edit', ['project' => $project]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'status' => 'required|string|in:planned,in progress,completed',
        ]);

        $project = Project::find($id);
        if ($request->user()->id !== $project->user_id) abort(401);
        $project->title = $data['title'];
        $project->description = $data['description'];
        $project->start_date = $data['start_date'];
        $project->status = $data['status'];
        $project->update();

        return redirect()->route('projects.index')->with('update_success', $project);
    }

    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();

        return redirect()->route('projects.index')->with('delete_success', $project);
    }
}
