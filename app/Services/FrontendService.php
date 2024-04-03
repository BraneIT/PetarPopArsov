<?php

namespace App\Services;

class FrontendService{

    public function GetDocuments($documentModel){
        //  $documents = $documentModel::orderBy('year', 'desc')->get();
        
        // // Group documents by year
        // $groupedDocuments = $documents->groupBy('year');

        // // Sort groups by year in descending order
        // $groupedDocuments = $groupedDocuments->sortKeysDesc();

        // // Sort each group by end_year if it exists
        // $sortedDocuments = collect();
        // foreach ($groupedDocuments as $year => $group) {
        //     if ($group->first()->end_year !== null) {
        //         $group = $group->sortByDesc('end_year');
        //     }
        //     $sortedDocuments = $sortedDocuments->merge($group);
        // }
        // return  $sortedDocuments;
        $documents = $documentModel::orderBy('year', 'desc')
                                ->orderBy('end_year', 'desc')
                                ->get();
    
        return $documents;
    }
    public function GetUniqueYears($documents){
        $data = collect($documents);
        $uniqueYears = $data->pluck('year')->unique()->values()->toArray();
        return $uniqueYears;
    }

}