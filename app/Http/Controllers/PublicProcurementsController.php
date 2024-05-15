<?php

namespace App\Http\Controllers;

use App\Models\PublicProcurements;
use App\Http\Requests\StorePublicProcurementsRequest;
use App\Http\Requests\UpdatePublicProcurementsRequest;
use App\Services\PublicProcurementsService;

class PublicProcurementsController extends Controller
{
    protected PublicProcurementsService $publicProcurementsService;
    public function __construct(PublicProcurementsService $publicProcurementsService)
    {
        $this->publicProcurementsService = $publicProcurementsService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publicProcurements = PublicProcurements::select('name', 'year', 'id', 'type')->get();
        return view('admin_views.public_procurements.index', compact('publicProcurements'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin_views.public_procurements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePublicProcurementsRequest $request)
    {
        $this->publicProcurementsService->store($request->validated());
        return redirect()->route('public.procurements.index')->with('success','Successfull');
    }

    /**
     * Display the specified resource.
     */
    public function show(PublicProcurements $publicProcurements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {   
        $publicProcurement =PublicProcurements::findOrFail($id);
        return view('admin_views.public_procurements.edit', compact('publicProcurement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePublicProcurementsRequest $request, $id)
    {
       
       $this->publicProcurementsService->update($request->validated(),$id);

       return redirect()->route('public.procurements.index')->with('success', 'successfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PublicProcurements $publicProcurements)
    {
        $publicProcurement = $this->publicProcurementsService->getById($publicProcurements);
        $publicProcurement->delete();
        return redirect()->route('public.procurements.index')->with('success', 'sucessfully deleted');
    }
}
