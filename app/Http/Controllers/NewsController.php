<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NewsService;
use App\Models\News;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
      protected $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'short_content' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'image|max:2048',
        ]);

        $this->newsService->createNews($validatedData);

        return redirect('/admin/news');
    }
    public function edit(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'short_content' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'image|max:2048',
        ]);

        $this->newsService->updateNews($id, $validatedData);

        return redirect('/admin/news')->with('success', 'News updated successfully!');
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        
        // Perform the search query
        $news = News::where('title', 'like', '%' . $searchTerm . '%')->get();
        
        // You can return the search results to a view or process them further as needed
        return view('admin_views.news.news_search', ['news' => $news]);
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        
        $imagePath = public_path($news->image);
        // Check if the file exists before attempting to delete it
        if (File::exists($imagePath)) {
            // Delete the image file from the public folder
            File::delete($imagePath);
        }
        $news->delete();
        
        return redirect('/admin/news')->with('success', 'News item deleted successfully.');
    }
    

}
