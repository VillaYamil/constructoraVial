<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeMachine extends Model
{
    protected $fillable = ['name','description'];

    public function machines(){
        
        return $this->hasMany(Machine::class);

    }
}
