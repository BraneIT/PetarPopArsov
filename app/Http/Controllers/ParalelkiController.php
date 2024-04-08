<?php

namespace App\Http\Controllers;

use App\Models\Paralelki;
use Illuminate\Http\Request;
use App\Services\ParalelkiService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class ParalelkiController extends Controller
{
      protected $service;

    public function __construct(ParalelkiService $service)
    {
        $this->service = $service;
    }
    public function index(){
        $paralelki = Paralelki::select('id', 'odelenska', 'predmetna')->first();
        return view('admin_views.paralelki.index', compact('paralelki'));
    }
    public function create(){
        return view('admin_views.paralelki.create');

    }
    public function store(Request $request){
        
        $validatedData = $request->validate([
            'odelenska' => 'required|file|mimes:jpeg,png,gif,webp,htm',
            'predmetna' => 'required|file|mimes:jpeg,png,gif,webp,htm'

        ], [
            'odelenska.required' => 'Полето за одделенски паралелки е задолжително.',
            'predmetna.required' => 'Полето за наставни паралелки е задолжително.',
            'odelenska.image' => 'Фајлот за одделенски паралелки мора да биде слика.',
            'predmetna.image' => 'Фајлот за наставни паралелки мора да биде слика.',
            'odelenska.mimes' => 'Фајлот за одделенски паралелки мора да биде во формат на WebP.',
            'predmetna.mimes' => 'Фајлот за наставни паралелки мора да биде во формат на WebP.'
        ]);
        
        $data = new Paralelki();
        $data->odelenska =$this->service->storeImage($validatedData['odelenska']);

        $data->predmetna =$this->service->storeImage($validatedData['predmetna']);
        $data->save();
        

        return redirect()->route('admin.paralelki');
    }
    public function destroy($id){
        $data = Paralelki::findOrFail($id);

         $odelenska = public_path($data->odelenska);
         $predmetna = public_path($data->predmetna);
           if (File::exists($odelenska) && File::exists($predmetna)) {
            // Delete the image file from the public folder
            File::delete($odelenska);
            File::delete($predmetna);
        }
        $data->delete();

        return redirect()->route('admin.paralelki');
    }
}
