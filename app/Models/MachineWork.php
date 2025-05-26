<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Machine_Work extends Model
{
    protected $fillable = ['id','start_date','end_date','reason_end','km','machine_id','works_id'];

    public function machines(){

        return $this->hasMany(Machine::class);
    }

    public function works(){

        return $this->hasMany(Work::class);
    }
}
