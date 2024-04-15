<?php

namespace App\Http\Controllers;

use App\Models\Prvacinja;
use Illuminate\Http\Request;
use App\Services\GalleryService;
use App\Services\PrvacinjaService;
use Illuminate\Support\Facades\File;


class PrvacinjaController extends Controller
{
      protected $prvacinjaService;

    public function __construct(PrvacinjaService $prvacinjaService)
    {
        $this->prvacinjaService = $prvacinjaService;
    }
    public function show(){
        $prvacinja = Prvacinja::select("path", 'type', 'id', 'year')->first();
        return view('admin_views.prvacinja.index', compact('prvacinja'));
    }
    public function create(){
        return view('admin_views.prvacinja.add_prvacinja');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'type' => 'required',
            'path' => 'required',
            'year' => 'required',
            
        ],[
            'image_path.required' => 'Please upload an image.',
           
        ]);
        
        if($validatedData['type'] == 1){
            $prvacinja = new Prvacinja();
            $prvacinja->type = $validatedData['type'];
            $prvacinja->path = $this->prvacinjaService->storeImage($validatedData['path'], $validatedData['year']);
            $prvacinja->year = $validatedData['year'];
            $prvacinja->save();
        }
        if($validatedData['type'] == 2){
            $prvacinja = new Prvacinja();
        }
        // $imageFile = $request->file($validatedData["image_path"]);
        // var_dump($validatedData['image_path']);
        // $imagePath = $this->galleryService->storeImage($validatedData['image_path']);
        // $data = new Prvacinja();
        // $data->image_path = $imagePath;
        // var_dump($data->path);
        // // $data->content = $validatedData['content'];

        // $data->save();
        return redirect('/admin/prvacinja')->with('success', 'News updated successfully!');
    }
    public function destroy($id){
        $data = Prvacinja::findOrFail($id);
        $imagePath = public_path($data->image_path);
        if (File::exists($imagePath)) {
            // Delete the image file from the public folder
            File::delete($imagePath);
        }

        $data->delete();

        return redirect('/admin/prvacinja')->with('success', 'Deleted succesfully');

    }

}
