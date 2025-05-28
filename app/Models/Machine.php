<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    protected $fillable = ['serial_number','brand_model','km','type_machine_id'];
    
    public function typeMachine(){

        return $this->belongsTo(TypeMachine::class);
    }
    
    public function services(){

        return $this->hasMany(Service::class);
    }

    public function machineWorks(){

        return $this->hasMany(MachineWork::class);
    }
}