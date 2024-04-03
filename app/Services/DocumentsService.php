<?php

namespace App\Services;

use App\Models\Erasmus;
use App\Models\Documents;
use App\Models\FinansiskiDokumenti;
use App\Models\GodisnjiIzvjestaji;
use App\Models\IntegralnaInspekcija;
use App\Models\IzvjestajOdSamoevaluacija;
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
                $document =new FinansiskiDokumenti;
                break;
            case 2:
                $document = new GodisnjiIzvjestaji();
                break;
            case 3:
                $document = new RazvojnaPrograma();
                break;
            case 4:
                $document = new IzvjestajOdSamoevaluacija();
                break;
            case 5:
                $document = new IntegralnaInspekcija();
                break;
            case 6:
                $document = new Takmicenja();
                break;
            
            default:
                // Handle invalid category_id
                return null;
        }
        
        // Set document attributes
        $document->title = $data['title'];
        $document->slug = Str::slug($document->title);
        $document->file = $this->saveDocument($data['file']);
        $document->category_id = $data['category_id'];
        $document->year = $data['year'];
        var_dump(isset($data['end_year']));
        if(isset($data['end_year'])){
            $document->end_year = $data['end_year'];
        }
        // Save the document
        $document->save();
        // var_dump($document);
        return $document;
    }

    public function updateDocument($id, array $data, Request $request){

        $oldCategoryId = $request->route('category_id');
        // var_dump($oldCategoryId);
        
        // $document = FinansiskiDokumenti::findOrFail($id);
        
        switch ($oldCategoryId) {
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
            
            default:
                // Handle invalid category_id
                return null;
        }
        // var_dump($document);
        if($data['category_id'] !== $oldCategoryId){
            
            switch ($data['category_id']) {
            case 1:
                $newDocument = new FinansiskiDokumenti();
                break;
            case 2:
                $newDocument = new GodisnjiIzvjestaji();
                break;
            case 3:
                $newDocument = new RazvojnaPrograma();
                break;
            case 4:
                $newDocument = new IzvjestajOdSamoevaluacija();
                break;
            case 5:
                $newDocument = new  IntegralnaInspekcija();
                break;
            case 6:
                $newDocument = new Takmicenja();
                break;
            
            default:
                // Handle invalid category_id
                return null;
            }
            $newDocument->title = $data['title'];
            $newDocument->year = $data['year'];
            $newDocument->file = $document->file;
            $newDocument->slug = Str::slug($document->title);
            $newDocument->category_id = $data['category_id'];
            $newDocument->save();
            $document->delete();
            return $newDocument;
        }
        else{
            $document->fill($data)->save();
            var_dump($document);
            return $document;
        }

    }
     public function saveDocument($file)
    {
        // Define the directory where you want to store the files
        $directory = 'assets/documents';

        // Generate a unique name for the file
        $fileName = uniqid() . '.'. $file->getClientOriginalExtension();

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