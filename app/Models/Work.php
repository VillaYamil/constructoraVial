<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = ['id','name','start_date','end_date','provinces_id'];

    public function provinces(){

        return $this->hasMany(Province::class);

    }

    public function machines_works(){

        return $this->hasMany(Machine_Work::class);
    }
}
