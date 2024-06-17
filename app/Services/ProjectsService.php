<?php

namespace App\Services;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use App\Models\Projekti;
use Illuminate\Support\Facades\File;

class ProjectsService{
    

    public function create(array $data){
        $imagePath = $this->storeImage($data["image_path"]);
        $project = new Projekti();
        $project->name = $data["name"];
        $project->slug =Str::slug($project->name);
        $project->year = $data["year"];
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
        return 'images/projects/' . $imageName; // 
    }
    public function update($id, $data){
        $project = Projekti::findOrFail($id);
        var_dump(isset($data['image_path']));
        if(isset($data['image_path'])){
            
            $imagePath = public_path($project->image_path);
            var_dump($imagePath);
            var_dump(File::exists($imagePath));
            if (File::exists($imagePath)) {
                // Delete the image file from the public folder
                File::delete($imagePath);
                echo "executed";
            }
          $project->image_path = $this->storeImage($data['image_path']);
        }
        $project->name = $data['name'];
        $project->content = $data['content'];
        $project->year = $data['year'];
        $project->save();
        return $project;
    }
}