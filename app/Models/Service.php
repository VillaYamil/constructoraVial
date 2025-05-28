<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['description','maintenance_date','km','machine_id'];

    public function machine(){

        return $this->belongsTo(Machine::class);   
        
    }
}
