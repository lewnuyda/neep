<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NeepProcess extends Model
{
    //
    protected $fillable = [
        'neep_process_action','neep_process_response_id','created_at',
    ];

    protected $table = 'tblneep_process';
}
