<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_attributes', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->integer('bus_id');
            $table->integer('year_of_manufacture')->nullable();
            $table->string('manufacturer', 255)->nullable();
            $table->integer('seating_capacity')->nullable();
            $table->string('fuel_type', 255)->nullable();
            $table->boolean('ac');
            $table->date('insurance_expireDate')->nullable();
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bus_attributes');
    }
}
