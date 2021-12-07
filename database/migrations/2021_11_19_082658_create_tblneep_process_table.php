<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblneepProcessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblneep_process', function (Blueprint $table) {
            $table->id();
            $table->text('neep_process_action');
            $table->text('neep_process_remarks');
            $table->bigInteger('neep_process_response_id');    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblneep_process');
    }
}
