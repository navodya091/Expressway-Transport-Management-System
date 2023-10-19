<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->id(); // This will create an auto-incrementing primary key
            $table->string('route_number', 255);
            $table->string('description', 255);
            $table->string('start_point_outbound', 255);
            $table->string('end_point_outbound', 255);
            $table->string('start_point_inbound', 255);
            $table->string('end_point_inbound', 255);
            $table->tinyInteger('status', false, true)->default(1); // Default status is 1 (active)
            $table->timestamps(); // This will create 'created_at' and 'updated_at' columns
        });

        // Add a comment for the Status column
        DB::statement('ALTER TABLE routes MODIFY COLUMN Status TINYINT(4) DEFAULT 1 COMMENT "1 = Active, 2 = Inactive"');
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routes');
    }
}
