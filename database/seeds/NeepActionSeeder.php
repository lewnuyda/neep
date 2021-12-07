<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\NeepAction;


class NeepActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        NeepAction::create([
            'neep_action'    => 'Accepted',
            
        ]);
        NeepAction::create([
            'neep_action'    => 'Declined',
           
        ]);
    }
}
