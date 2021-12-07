<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    //
    public static function get_all_groups()
    {
        $query=DB::table('tblgroups')->orderBy('id', 'asc')->get();
        return $query;
    }

   
}
