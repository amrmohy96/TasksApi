<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Project::class,'project');
    }


    public function index()
    {

        $projects = Project::withCount('tasks')->whereUserId(auth()->id())
            ->get();
        return ProjectResource::collection($projects);
    }


    public function store(ProjectRequest $request)
    {
        $project = auth()->user()->projects()->create($request->all());
        return new ProjectResource($project);
    }


    public function show(Project $project)
    {
        $project->tasks;
        return new ProjectResource($project);
    }


    public function update(ProjectRequest $request, Project $project)
    {
        $project->update($request->all());
        $tasks = $project->tasks;
        return new ProjectResource($project);
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return response()->json('deleted successfully',\Symfony\Component\HttpFoundation\Response::HTTP_NO_CONTENT);
    }
}
