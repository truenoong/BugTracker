<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Models\ProjectManager;
use App\Models\ProjectDeveloper;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('project_id')->get();
        return view('projects.index')->with('projects', $projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = DB::table('users')->pluck('name', 'id');
        return view('projects.create')->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $project = new Project;
        $project->project_name = $request->input("name");
        $project->project_desc = $request->input("description");
        $project->save();

        foreach($request->project_managers as $project_manager) {
            ProjectManager::create([
                'project_id' => $project->project_id,
                'id' => $project_manager
            ]);
        }

        foreach($request->project_developers as $project_developer) {
            ProjectDeveloper::create([
                'project_id' => $project->project_id,
                'id' => $project_developer
            ]);
        }

        return redirect('/projects')->with('success', 'Successfully Created a New Project');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        $projectManagers = ProjectManager::where('project_id', '=', $id)->get();
        $projectDevelopers = ProjectDeveloper::where('project_id', '=', $id)->get();
        return view('projects.show')->with('project', $project)->with('projectManagers', $projectManagers)->with('projectDevelopers', $projectDevelopers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        $users = DB::table('users')->pluck('name', 'id');
        $projectManagers = DB::table('project_managers')->where('project_id', '=', $id)->pluck('id');
        $projectDevelopers = DB::table('project_developers')->where('project_id', '=', $id)->pluck('id');
        return view('projects.edit')->with('project', $project)->with('users', $users)->with('projectManagers', $projectManagers)->with('projectDevelopers', $projectDevelopers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $project = Project::find($id);
        $project->project_name = $request->input("name");
        $project->project_desc = $request->input("description");
        $project->save();

        $projectManager = ProjectManager::where('project_id', '=', $id);
        $projectManager->delete();
        $projectDeveloper = ProjectDeveloper::where('project_id', '=', $id);
        $projectDeveloper->delete();

        foreach($request->project_managers as $project_manager) {
            ProjectManager::create([
                'project_id' => $project->project_id,
                'id' => $project_manager
            ]);
        }

        foreach($request->project_developers as $project_developer) {
            ProjectDeveloper::create([
                'project_id' => $project->project_id,
                'id' => $project_developer
            ]);
        }

        return redirect('/projects')->with('success', 'Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $projectManager = ProjectManager::where('project_id', '=', $id);
        $projectManager->delete();
        $projectDeveloper = ProjectDeveloper::where('project_id', '=', $id);
        $projectDeveloper->delete();
        $project->delete();
        
        return redirect('/projects')->with('success', 'Successfully deleted');
    }
}
