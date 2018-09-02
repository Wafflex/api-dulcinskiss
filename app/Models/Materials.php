<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Providers;
use App\Models\Meditions;

class Materials extends Model
{
    public function providers()
    {
        return $this->hasOne(Providers::class,'providers_id');
    }

    public function meditions()
    {
        return $this->hasOne(Meditions::class,'meditions_id');
    }

    public function getMaterials(){
        $data = Materials::
                    select('materials.description','providers.name as proveedor','materials.quantity as cantidad','meditions.description as medicion')
                    ->leftJoin('providers','materials.providers_id','providers.id')
                    ->leftJoin('meditions','materials.meditions_id','meditions.id')
                    ->get();
        return $data;
    }
}
