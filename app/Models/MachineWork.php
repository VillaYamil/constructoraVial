<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MachineWork extends Model
{
    protected $fillable = ['start_date','end_date','reason_end','km_start','km_end','machine_id','work_id'];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function machine(){
        return $this->belongsTo(Machine::class);
    }

    public function work() {
        return $this->belongsTo(Work::class);
    }
}


