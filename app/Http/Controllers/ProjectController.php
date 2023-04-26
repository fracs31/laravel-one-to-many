<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Str; //str
use Illuminate\Http\Request; //request

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $trashed = $request->input("trashed"); //cestino
        $num_of_trashed = Project::onlyTrashed()->count(); //numeri di progetti cestinati
        //Se viene cliccato il cestino
        if ($trashed === "1") {
            $projects = Project::onlyTrashed()->get(); //prendo i progetti che sono stati cancellati
        } else { //altrimenti
            $projects = Project::all(); //prendo tutti i progetti del database tranne quelli cancellati
        }
        return view("projects.index", compact("projects", "num_of_trashed")); //restituisco la vista "index"
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("projects.create"); //restituisco la vista "create"
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated(); //valido i dati
        $data["url"] = "http://www.projects.com/" . $data["title"]; //url
        $data["slug"] = Str::slug($data["title"], "-"); //slug
        $newProject = Project::create($data); //creo un nuovo progetto
        return to_route("projects.show", $newProject); //restistuisco la rotta "show"
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view("projects.show", compact("project")); //restituisco la vista "show"
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view("projects.edit", compact("project")); //restituisco la vista "edit"
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated(); //valido i dati
        $data["url"] = "http://www.projects.com/" . $data["title"]; //url
        $data["slug"] = Str::slug($data["title"], "-"); //slug
        $project->update($data); //creo un nuovo progetto
        return to_route("projects.show", $project); //restistuisco la rotta "show"
    }

    //Restore
    public function restore(Project $project) {
        //Se il progetto è stato cancellato
        if ($project->trashed()) {
            $project->restore(); //ripristino il progetto
            request()->session()->flash("message", "Il post " . $project->title . " è stato ripristinato"); //messaggio di ripristino del progetto
        }
        return back(); //torno nella pagina precedente
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //Se il progetto è stato eliminato
        if ($project->trashed()) {
            $project->forceDelete(); //effettuo una cancellazione definitiva
        } else { //altrimenti
            $project->delete(); //effettuo una soft delete
        }
        return to_route("projects.index"); //restistuisco alla rotta "index"
    }
}
