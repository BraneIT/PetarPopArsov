<?php

namespace App\Services;
use App\Models\News;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class NewsService
{
    public function createNews(array $data)
    {

        $news = new News();
        // Upload image and get its path
        if (isset($data['image'])) {
        $imagePath = $this->uploadImage($data['image']);
        $news->image = $imagePath;
        } 
        
        // Create a new news item
        
        $news->title = $data['title'];
        $news->slug = Str::slug($news->title);
        $news->short_content = $data['short_content'];
        $news->content = $data['content'];

        $news->save();

        return $news;
    }
     public function updateNews($id, array $data)
    {
        $news = News::findOrFail($id);

        if (isset($data['image'])) {
            $data['image'] = $this->uploadImage($data['image']);
            $news->image = $data['image'];
        }
      
        $news->fill($data)->save();
  
        return $news;
    }

    private function uploadImage($image)
    {
        // Handle image upload and storage, return the image path
         $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $imageName = $originalName . '_' . time() . '.webp';
        $optimizedImage = Image::make($image)->encode('webp', 50);
        $optimizedImage->save(public_path('images/news') . '/' . $imageName);
        return 'images/news/' . $imageName;
    }
}