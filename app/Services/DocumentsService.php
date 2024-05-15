<?php

namespace App\Services;

use App\Models\Erasmus;
use App\Models\Documents;
use App\Models\Etvining;
use App\Models\FinansiskiDokumenti;
use App\Models\GodisnjiIzvjestaji;
use App\Models\IntegralnaInspekcija;
use App\Models\IzvjestajOdSamoevaluacija;
use App\Models\MedjuetnickaIntegracija;
use App\Models\RazvojnaPrograma;
use App\Models\Takmicenja;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class DocumentsService{


    public function storeErasmus(array $data){
        $documentPath = $this->saveErasmusDocument($data['file']);
        $erasmus = new Erasmus();

        $erasmus->name = $data['name'];
        $erasmus->slug = Str::slug($erasmus->name);
        $erasmus->path = $documentPath;
        $erasmus->start_date = $data['start_date'];
        $erasmus->end_date = $data['end_date'];

        $erasmus->save();
        
        return $erasmus;
    }

       public function updateErasmus($id, array $data)
    {
        $news = Erasmus::findOrFail($id);

        // Update only the fields that are provided in the data
        $news->fill($data)->save();

        return $news;
    }

     public function saveErasmusDocument($file)
    {
        // Define the directory where you want to store the files
        $directory = 'assets/erasmus';

        // Generate a unique name for the file
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

        // Move the file to the storage location
        $file->move(public_path($directory), $fileName);

        // Return the path to the stored file
        return $directory . '/' . $fileName;
    }

    function storeDocuments(array $data){
       

        var_dump($data);
        $categoryId = $data['category_id'];
        
        switch ($categoryId) {
            case 1:
                $document =new FinansiskiDokumenti();
                $folder = 'FinansiskiDokumenti';
                break;
            case 2:
                $document = new GodisnjiIzvjestaji();
                $folder = 'GodisnjiIzvjestaji';
                break;
            case 3:
                $document = new RazvojnaPrograma();
                $folder = 'RazvojnaPrograma';
                break;
            case 4:
                $document = new IzvjestajOdSamoevaluacija();
                $folder = 'IzvjestajOdSamoevaluacija';
                break;
            case 5:
                $document = new IntegralnaInspekcija();
                $folder = 'IntegralnaInspekcija';
                break;
            case 6:
                $document = new Takmicenja();
                $folder = 'Takmicenja';
                break;
            case 7:
                $document = new MedjuetnickaIntegracija();
                $folder = 'MedjuetnickaIntegracija';
                break;
            case 8:
                $document = new Etvining();
                $folder = 'Etvining';
                break;
            default:
                // Handle invalid category_id
                return null;
        }
        // Set document attributes
        $document->title = $data['title'];
        $document->slug = Str::slug($document->title);
        $document->file = $this->saveDocument($data['file'], $folder);
        $document->category_id = $data['category_id'];
        if($data['category_id']==1 && isset($data['finance_category_id'])){
            $document->finance_category_id =$data['finance_category_id'];
        }
        $document->year = $data['year'];
        var_dump(isset($data['end_year']));
        if(isset($data['end_year'])){
            $document->end_year = $data['end_year'];
        }
        else{
            $document->end_year = NULL;
        }
        // Save the document
        $document->save();
        
        return $document;
    }

    public function updateDocument($id, array $data, Request $request){

        $oldCategoryId = $request->route('category_id');
        // var_dump($oldCategoryId);
        
        // $document = FinansiskiDokumenti::findOrFail($id);
        switch ($oldCategoryId) {
            case 1:
                $document =FinansiskiDokumenti::findOrFail($id);
                $folder = 'FinansiskiDokumenti';
                break;
            case 2:
                $document =GodisnjiIzvjestaji::findOrFail($id);
                $folder = 'GodisnjiIzvjestaji';
                break;
            case 3:
                $document =RazvojnaPrograma::findOrFail($id);
                $folder = 'RazvojnaPrograma';
                break;
            case 4:
                $document =IzvjestajOdSamoevaluacija::findOrFail($id);
                $folder = 'IzvjestajOdSamoevaluacija';
                break;
            case 5:
                $document = IntegralnaInspekcija::findOrFail($id);
                $folder = 'IntegralnaInspekcija';
                break;
            case 6:
                $document = Takmicenja::findOrFail($id);
                $folder = 'Takmicenja';
                break;
            case 7:
                $newDocument =MedjuetnickaIntegracija::findOrFail($id);
                $folder = 'MedjuetnickaIntegracija';
                break;
            case 8:
                $newDocument = Etvining::findOrFail($id);
                $folder = 'Etvining';
                break;
            default:
                // Handle invalid category_id
                return null;
        }
        
        // var_dump($document);
        if($data['category_id'] !== $oldCategoryId){
            
            switch ($data['category_id']) {
                case 1:
                    $newDocument =new FinansiskiDokumenti();
                    $folder = 'FinansiskiDokumenti';
                    break;
                case 2:
                    $newDocument = new GodisnjiIzvjestaji();
                    $folder = 'GodisnjiIzvjestaji';
                    break;
                case 3:
                    $newDocument = new RazvojnaPrograma();
                    $folder = 'RazvojnaPrograma';
                    break;
                case 4:
                    $newDocument = new IzvjestajOdSamoevaluacija();
                    $folder = 'IzvjestajOdSamoevaluacija';
                    break;
                case 5:
                    $newDocument = new IntegralnaInspekcija();
                    $folder = 'IntegralnaInspekcija';
                    break;
                case 6:
                    $newDocument = new Takmicenja();
                    $folder = 'Takmicenja';
                    break;
                case 7:
                    $newDocument = new MedjuetnickaIntegracija();
                    $folder = 'MedjuetnickaIntegracija';
                    break;
                case 8:
                    $newDocument = new Etvining();
                    $folder = 'Etvining';
                    break;
                default:
                    // Handle invalid category_id
                    return null;
            }
            $newDocument->title = $data['title'];
            $newDocument->year = $data['year'];
            var_dump(isset($data['file']));
            if(isset($data['file'])){
                $newDocument->file = $this->saveDocument($data['file'], $folder);
            }
            else{
                $newDocument->file = $document->file;
            }
            
            $newDocument->slug = Str::slug($document->title);
            $newDocument->category_id = $data['category_id'];
            
            if($data['category_id']==1 && isset($data['finance_category_id'])){
                $newDocument->finance_category_id =$data['finance_category_id'];
            }
            
            $document->delete();
            $newDocument->save();
            return $newDocument;
        }
        else{
            
            if(isset($data['file'])){
                $document->file = $this->saveDocument($data['file'],$folder);
            }
            
            $document->fill($data)->save();
            
            return $document;
        }

    }
     public function saveDocument($file, $folder)
    {
        $directory = 'assets/documents/' . $folder;

        // Get the original file name without the extension
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
    
        // Sanitize the file name to remove any unwanted characters except for Cyrillic
        // This regex now allows Cyrillic characters, along with alphanumeric, hyphen, underscore, and period
        $sanitizedOriginalName = preg_replace('/[^a-zA-Z0-9\-\_\.\p{Cyrillic}]/u', '_', $originalName);
    
        // Generate a unique ID to append to the original file name to ensure uniqueness
        $uniqueId = uniqid('-', true);
    
        // Get the original file extension
        $extension = $file->getClientOriginalExtension();
    
        // Concatenate the sanitized original name, unique ID, and extension to form the new file name
        $fileName = $sanitizedOriginalName . $uniqueId . '.' . $extension;
    
        // Move the file to the storage location
        $file->move(public_path($directory), $fileName);
        
        // Return the path to the stored file
        return $directory . '/' . $fileName;
       
    }
    public function getDocuments($id){
         $documents = Documents::where('category_id', $id)->get();
         return $documents;
    }
    
}