<?php

namespace App\Http\Controllers;

use App\Models\Prvacinja;
use App\Http\Requests\StorePrvacinjaRequest;
use App\Http\Requests\UpdatePrvacinjaRequest;
use App\Services\PrvacinjaService;
use Illuminate\Support\Facades\File;

class PrvacinjaController extends Controller
{

    protected PrvacinjaService $prvacinjaService;
    public function __construct(PrvacinjaService $prvacinjaService)
    {
        $this->prvacinjaService = $prvacinjaService;
    }


    /**
     * 
     * 
     *  
     */ 
    public function getAllUniqueYears(){
        
    }

    

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $uniqueYears = $this->prvacinjaService->getUniqueYears();
        return view("admin_views.prvacinja.index", compact("uniqueYears"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin_views.prvacinja.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePrvacinjaRequest $request)
    {

        // Store the validated data
        $this->prvacinjaService->store($request->validated());
    
        return redirect()->route('index.prvacinja')->with('success', 'Документ је унесен успешно');
    }

    /**
     * Display the specified resource.
     */
    public function show($year)
    {
        // dd($this->prvacinjaService->getPrvacinjaByYear($year));
       $prvacinja = $this->prvacinjaService->getPrvacinjaByYear($year);
        return view('admin_views.prvacinja.show', compact('prvacinja'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prvacinja $prvacinja)
    {      
        $prvacinja->delete();
        $documentPath = public_path($prvacinja->document_path);
        if (File::exists($documentPath)) {   
            File::delete($documentPath);
        }
        return redirect()->route('index.prvacinja')->with('success', 'Prvacinja deleted successfully');
    }
}
