<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    protected $fillable = ['id','serial_number','brand_mode','type_machines_id'];
    
    public function typeMachines(){

        return $this->hasMany(TypeMachine::class);
    }
    
    public function services(){

        return $this->belongsTo(Service::class);
    }

    public function works(){

        return $this->belongsTo(Work::class);
    }
}