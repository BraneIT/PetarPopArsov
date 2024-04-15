<?php

namespace App\Http\Controllers;

use App\Models\Projekti;
use Illuminate\Http\Request;
use App\Services\ProjectsService;
use Illuminate\Support\Facades\File;

class ProjectsController extends Controller
{
    protected $projectsService;
    public function __construct(ProjectsService $projectsService){
        $this->projectsService = $projectsService;
    }
    public function index(){
        $projects = Projekti::select('name', 'id')->get();
        return view("admin_views.projects.index", compact("projects"));
    }
    public function create(){
        return view("admin_views.projects.create");
    }
    public function store(Request $request){
        
        $validatedData = $request->validate([
            "name"=> "required",
            "content"=> "required",
            "image_path"=> "required|image|max:2048",
        ],[
            "name.required"=> "Name is required",
            "image_path.required"=> "Image is required",
        ]);
        $this->projectsService->create($validatedData);
        
        
        return route('projects');
    }
    public function destroy($id){
        $project = Projekti::findOrFail($id);
        $imagePath = public_path($project->image_path);
        if (File::exists($imagePath)) {
            
            File::delete($imagePath);
        }

        $project->delete();
        return route('projects');
    }
}
