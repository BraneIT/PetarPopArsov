<?php

namespace App\Services;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use App\Models\Projekti;

class ProjectsService{
    

    public function create(array $data){
        $imagePath = $this->storeImage($data["image_path"]);
        $project = new Projekti();
        $project->name = $data["name"];
        $project->slug =Str::slug($project->name);
        $project->content = $data["content"];
        var_dump(isset($data["image_path"]));
      
        $project->image_path = $imagePath;
        $project->save();
        return $project;
    }
    
    public function storeImage($image){
        $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $imageName = $originalName . '_' . time() . '.webp';
        $optimizedImage = Image::make($image)->encode('webp', 50);
        $optimizedImage->save(public_path('images/projects') . '/' . $imageName);
        return '/images/projects/' . $imageName; // 
    }
}