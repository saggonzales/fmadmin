<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFitMachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('fit_machines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mac_address', 50);
            $table->string('description', 255)->default("");
            $table->string('nonce', 12);            
            $table->integer('zone')->unsigned();
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
        if (Schema::hasTable('fit_machines')) {
            Schema::drop('fit_machines');
        }        
    }
}
