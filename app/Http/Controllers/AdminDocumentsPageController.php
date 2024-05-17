<?php

namespace App\Http\Controllers;

use App\Models\Erasmus;
use App\Models\Documents;
use App\Models\Takmicenja;
use Illuminate\Http\Request;
use App\Models\RazvojnaPrograma;
use App\Models\DocumentCategories;
use App\Models\GodisnjiIzvjestaji;
use App\Models\FinansiskiDokumenti;
use App\Models\IntegralnaInspekcija;
use App\Models\IzvjestajOdSamoevaluacija;
use App\Models\Etvining;
use App\Models\MedjuetnickaIntegracija;
use League\CommonMark\Node\Block\Document;

class AdminDocumentsPageController extends Controller
{
    public function index_erasmus(){

        $erasmus = Erasmus::all();
        return view('admin_views.erasmus.index', compact('erasmus'));
    }
    public function show_add_erasmus(){
        return view('admin_views.erasmus.add_erasmus');
    }
    public function edit_erasmus($id){
        $erasmus = Erasmus::findOrFail($id);
        
        return view('admin_views.erasmus.edit_erasmus', compact('erasmus'));
    }
    public function index_documents(){
        $documents = Documents::all();
        $categories = DocumentCategories::all();

        return view('admin_views.documents.index', compact('categories'));
    }
    public function create_documents(){
        $categories = DocumentCategories::all();
        return view('admin_views.documents.add_documents', compact('categories'));
    }
    public function documentsByCategories($id){
        $category = DocumentCategories::findOrFail($id);
         switch ($id) {
            case 1:
                $documents =  FinansiskiDokumenti::all();
                break;
            case 2:
                $documents = GodisnjiIzvjestaji::all();
                break;
            case 3:
                $documents =RazvojnaPrograma::all();
                break;
            case 4:
                $documents =IzvjestajOdSamoevaluacija::all();
                break;
            case 5:
                $documents =IntegralnaInspekcija::all();
                break;
            case 6:
                $documents =Takmicenja::all();
                break;
            case 7:
                $documents =MedjuetnickaIntegracija::all();
                break;
            case 8:
                $documents = Etvining::all();
                break;    
            default:
                // Handle invalid category_id
                return null;
        }
        return view('admin_views.documents.documents_by_categories', compact( 'documents', 'category'));
    }
    public function editDocuments($category_id,$id){
        switch($category_id){
            case 1:
                $document = FinansiskiDokumenti::findOrFail($id);
                break;
            case 2:
                $document = GodisnjiIzvjestaji::findOrFail($id);
                break;
            case 3:
                $document = RazvojnaPrograma::findOrFail($id);
                break;
            case 4:
                $document = IzvjestajOdSamoevaluacija::findOrFail($id);
                break;
            case 5:
                $docuemnt = IntegralnaInspekcija::findOrFail($id);
                break;
            case 6:
                $document = Takmicenja::findOrFail($id);
                break;
            
        }
        $fileName = substr($document->file, 37);
        $categories = DocumentCategories::all();
        return view('admin_views.documents.edit_documents', compact('document', 'categories','fileName'));
    }
}
