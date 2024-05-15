<?php

namespace App\Services;

use Intervention\Image\Facades\Image;
use App\Models\Prvacinja;

class PrvacinjaService{

    public function getUniqueYears(){
        $uniqueYears = Prvacinja::distinct()->pluck('year')->toArray();
       
        return $uniqueYears;
    }
    public function getPrvacinjaByYear($year){
        $prvacinja = Prvacinja::where("year", $year)->get();
        return $prvacinja;
    }

    public function store(array $data){
        $prvacinja = new Prvacinja();
    
    // Store the document and get the path
    $documentPath = $this->storeDocument($data['document_path'], $data['year']);
    
    // Assuming you have a 'document_path' field in your 'Prvacinja' model
    // You can adjust this as per your actual model structure
    $data['document_path'] = $documentPath;
    
    // Store the rest of the data along with the document path
    $prvacinja->fill($data)->save();
    
    return $prvacinja;
        
    }

    // public function storeImage($image, $year) {
    //     $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
    //     $imageName = $originalName . '_' . time() . '.webp';
    
    //     // Create directory if it doesn't exist
    //     $directory = public_path('assets/prvacinja/' . $year);
    //     if (!file_exists($directory)) {
    //         mkdir($directory, 0777, true);
    //     }
    
    //     // Save the image in the specified directory
    //     $optimizedImage = Image::make($image)->encode('webp', 50);
    //     $optimizedImage->save($directory . '/' . $imageName);
    
    //     // Return the path to the saved image
    //     return '/assets/prvacinja/' . $year . '/' . $imageName;
    // }
    public function storeDocument($file, $year) {
        // Define the directory where documents will be stored, using the year
        $directory = 'assets/prvacinja/' . $year;
    
        // Create the directory if it doesn't exist
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }
    
        // Get the original file name without the extension
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
    
        // Sanitize the file name to remove any unwanted characters
        $sanitizedOriginalName = preg_replace('/[^a-zA-Z0-9\-\_\.\p{Cyrillic}]/u', '_', $originalName);
    
        // Generate a unique ID to append to the original file name to ensure uniqueness
        $uniqueId = uniqid('-', true);
    
        // Get the original file extension
        $extension = $file->getClientOriginalExtension();
    
        // Concatenate the sanitized original name, unique ID, and extension to form the new file name
        $fileName = $sanitizedOriginalName . '_' . $uniqueId . '.' . $extension;
    
        // Move the file to the storage location
        $file->move(public_path($directory), $fileName);
    
        // Return the path to the stored file
        return $directory . '/' . $fileName;
    }
}