<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['id','description','maintenance_date','km','machine_id'];

    public function services(){

        return $this->HasMany(Machine::class);   
        
    }
}
