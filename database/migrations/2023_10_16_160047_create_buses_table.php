<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('driver_id');
            $table->unsignedInteger('bus_attribute_id')->nullable();
            $table->string('bus_number');
            $table->tinyInteger('status', false, true)->default(1); // Default status is 1 (active)
            $table->timestamps();
        });

        // Add a comment for the Status column
        DB::statement('ALTER TABLE buses MODIFY COLUMN Status TINYINT(4) DEFAULT 1 COMMENT "1 = Active, 2 = Inactive"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buses');
    }
}
