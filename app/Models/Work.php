<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = ['name','start_date','end_date','province_id'];

    public function province(){

        return $this->belongsTo(Province::class);

    }

    public function machineWorks(){

        return $this->hasMany(MachineWork::class);
    }
}
