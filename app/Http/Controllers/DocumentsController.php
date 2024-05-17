<?php

namespace App\Http\Controllers;

use App\Models\Erasmus;
use App\Models\Documents;
use App\Models\Takmicenja;
use Illuminate\Http\Request;
use App\Models\RazvojnaPrograma;
use App\Models\GodisnjiIzvjestaji;
use App\Services\DocumentsService;
use App\Models\FinansiskiDokumenti;
use App\Models\IntegralnaInspekcija;
use Illuminate\Support\Facades\File;
use App\Models\IzvjestajOdSamoevaluacija;
use App\Models\Etvining;
use App\Models\MedjuetnickaIntegracija;

class DocumentsController extends Controller
{
    protected $documentService;

    public function __construct(DocumentsService $documentService)
    {
        $this->documentService = $documentService;
    }

    public function store_erasmus(Request $request){
        $validatedData = $request->validate([
            'name'=> 'required',
            'file'=> 'required',
            'start_date'=> 'required',
            'end_date'=> 'required'
        ]);
        $this->documentService->storeErasmus($validatedData);
        return redirect('/admin/erasmus');
    }
     public function edit_erasmus(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'=> 'required',
            'start_date'=> 'required',
            'end_date'=> 'required'
        ],
        [
            'name.required' => 'The name field is required.',
            'start_date.required' => 'The start date field is required.',
            'end_date.required' => 'The end date field is required.'
        ]);

        $this->documentService->updateErasmus($id, $validatedData);

        return redirect('/admin/erasmus')->with('success', 'Erasmus+ updated successfully!');
    }
     public function destroy_erasmus($id)
    {
        $erasmus = Erasmus::findOrFail($id);
        
        $imagePath = public_path($erasmus->path);
        // Check if the file exists before attempting to delete it
        if (File::exists($imagePath)) {
            // Delete the image file from the public folder
            File::delete($imagePath);
        }
        $erasmus->delete();
        
        return redirect('/admin/erasmus')->with('success', 'News item deleted successfully.');
    }
    public function storeDocuments(Request $request){
        $validatedData = $request->validate([
            'title'=> 'required',
            'file' => 'required|file|mimes:pdf|max:2048',
            'category_id' => 'required',
            'year' => 'required',
            'end_year' => 'nullable',
            'finance_category_id' =>'nullable'
        ],[
            'file.mimes' => 'Please upload a pdf file'
        ]);
        $this->documentService->storeDocuments($validatedData);
        
        return redirect()->route('admin.documents.category', ['id' => $validatedData['category_id']]);
    }
    public function updateDocuments($id, Request $request){
        $id = $request->route('id');
        $validatedData = $request->validate([
            'title'=> 'required',
            'category_id' => 'required',
            'year' => 'required',
            'finance_category_id' =>'nullable'
        ]);
        // $validatedData['category_id'] = $request->category_id;
        $this->documentService->updateDocument($id, $validatedData, $request);

        
        //Redirect back to a specific route or page
        return redirect()->route('admin.documents.category', ['id' => $validatedData['category_id']]);
    }
    public function destroyDocument($category_id,$id){
        switch ($category_id) {
            case 1:
                $document =FinansiskiDokumenti::findOrFail($id);
                break;
            case 2:
                $document =GodisnjiIzvjestaji::findOrFail($id);
                break;
            case 3:
                $document =RazvojnaPrograma::findOrFail($id);
                break;
            case 4:
                $document =IzvjestajOdSamoevaluacija::findOrFail($id);
                break;
            case 5:
                $document = IntegralnaInspekcija::findOrFail($id);
                break;
            case 6:
                $document = Takmicenja::findOrFail($id);
                break;
                case 7:
                $document =MedjuetnickaIntegracija::findOrFail($id);
                break;
                case 8:
                $document = Etvining::findOrFail($id);
                    break;
            default:
                // Handle invalid category_id
                return null;
        }
        // $document = Documents::findOrFail($id);
        $documentPath = public_path($document->file);
        if (File::exists($documentPath)) {
            // Delete the image file from the public folder
            File::delete($documentPath);
        }

        $document->delete(); 
        return redirect()->route('admin.documents.category', ['id' => $category_id]);
    }
}
