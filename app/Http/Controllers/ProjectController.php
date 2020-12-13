<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('user')->paginate(10);
        return view("projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project = new Project();
        $title = "Crear proyecto";
        $textButton = "Crear";
        $route = route("projects.store");
        return view("projects.create", compact("title", "textButton", "route", "project"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $validate = request()->validate([
            'name'          =>  'required|max:140|unique:projects',
            'description'   =>  'nullable|string|min:10',
        ]);
        Project::create([
            'name'          =>  $validate['name'],
            'description'   =>  $validate['description']
        ]);
        return redirect(route('projects.index'))->with('success', 'Proyecto creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $update = true;
        $title = "Editar proyecto";
        $textButton = "Editar";
        $route = route("projects.update", $project);
        return view("projects.edit", compact("update", "title", "textButton", "route", "project"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Project $project)
    {
        $validate = request()->validate([
            'name'          =>  'required|max:140|unique:projects',
            'description'   =>  'nullable|string|min:10',
        ]);
        $project->update([
            'name'          =>  $validate['name'],
            'description'   =>  $validate['description']
        ]);
        return back()->with('success', 'Proyecto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
