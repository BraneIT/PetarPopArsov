<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Http\Requests\StoreActivitiesRequest;
use App\Http\Requests\UpdateActivitiesRequest;
use App\Services\ActivitiesService;
use Illuminate\Support\Facades\File;

class ActivitiesController extends Controller
{
    protected ActivitiesService $activitiesService;

    public function __construct(ActivitiesService $activitiesService)
    {
        $this->activitiesService = $activitiesService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = $this->activitiesService->getAll();
        return view('admin_views.activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin_views.activities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActivitiesRequest $request)
    {   
        $this->activitiesService->store($request->validated());
        return redirect()->route('activities.index')->with('success', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Activities $activities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $activity = $this->activitiesService->getById($id);
        return view('admin_views.activities.edit',compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActivitiesRequest $request, $id)
    {
        $this->activitiesService->update($request->validated(), $id);
        return redirect()->route('activities.index')->with('success', 'successfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $activity = Activities::findOrFail($id);
        $imagePath = public_path($activity->image_path);
        if (File::exists($imagePath)) {
            
            File::delete($imagePath);
        }

        $activity->delete();
        return redirect()->route('activities.index')->with('success','Активност успешно обрисана');
    }
}
