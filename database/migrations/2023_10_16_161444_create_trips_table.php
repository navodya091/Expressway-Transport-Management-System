<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->integer('route_id')->nullable(); 
            $table->integer('bus_id')->nullable(); 
            $table->string('direction', 255)->nullable(); 
            $table->dateTime('departure_time')->nullable(); 
            $table->dateTime('arrival_time')->nullable(); 
            $table->tinyInteger('status', false, true)->default(1); // Default status is 1 (active)
            // Other columns

            $table->timestamps(); // Created at and updated at timestamps
        });

         // Add a comment for the Status column
         DB::statement('ALTER TABLE trips MODIFY COLUMN Status TINYINT(4) DEFAULT 1 COMMENT "1 = Active, 2 = Inactive"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips');
    }
}
