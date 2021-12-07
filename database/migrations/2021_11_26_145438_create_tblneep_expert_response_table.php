<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblneepExpertResponseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblneep_expert_response', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('neep_expert_response');
            $table->text('neep_expert_remarks');
            $table->bigInteger('neep_request_id');
            $table->bigInteger('neep_expert_id');
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
        Schema::dropIfExists('tblneep_expert_response');
    }
}
