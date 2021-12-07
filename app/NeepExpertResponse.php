<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NeepExpertResponse extends Model
{
    //
    protected $fillable = [
        'neep_expert_response','neep_request_id','neep_expert_id','created_at','updated_at',
    ];

    protected $table = 'tblneep_expert_response';
}
