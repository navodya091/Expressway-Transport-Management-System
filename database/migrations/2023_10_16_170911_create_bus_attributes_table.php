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
            $table->integer('BusID');
            $table->integer('YearOfManufacture')->nullable();
            $table->string('Manufacturer', 255)->nullable();
            $table->integer('SeatingCapacity')->nullable();
            $table->string('FuelType', 255)->nullable();
            $table->boolean('AC');
            $table->date('InsuranceExpireDate')->nullable();
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
