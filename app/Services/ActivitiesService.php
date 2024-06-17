<?php

namespace App\Services;

use App\Models\Activities;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ActivitiesService{

    public function getAll(){
        $activities = Activities::all();
        return $activities;
    }
    public function getById($id){
        return Activities::findOrFail($id);
    }
    public function store($data){
        
        $activity = new Activities();
        $activity->name = $data['name'];
        $activity->image_path = $this->storeImage($data['image_path']);
        $activity->slug = Str::slug($activity->name);
        $activity->year = $data['year'];
        $activity->content = $data['content'];
        return $activity->save();
        
    }
    public function update($data, $id){
        $activity = $this->getById($id);
        
        if(isset($data['image_path'])){
            
            $imagePath = public_path($activity->image_path);
            var_dump($imagePath);
            var_dump(File::exists($imagePath));
            if (File::exists($imagePath)) {
                // Delete the image file from the public folder
                File::delete($imagePath);
            }
          $activity->image_path = $this->storeImage($data['image_path']);
        }

        $activity->name = $data['name'];
        $activity->slug = Str::slug($activity->name);
        $activity->content = $data['content'];
        $activity->year = $data['year'];
        $activity->save();
        return $activity;
    }
    public function storeImage($image){
        
            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $imageName = $originalName . '_' . time() . '.webp';
            $optimizedImage = Image::make($image)->encode('webp', 50);
            $optimizedImage->save(public_path('images/activities') . '/' . $imageName);
            return 'images/activities/' . $imageName; 
    }
}