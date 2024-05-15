<?php

namespace App\Services;

use App\Models\PublicProcurements;

class PublicProcurementsService{
    public function getById($id){
        return PublicProcurements::findOrFail($id);
    }
    public function store($data){
        return PublicProcurements::create($data);
    }
    public function update($data, $id){


        return $this->getById($id)->update($data);
       
    }
}