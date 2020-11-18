<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // treatments table
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            // this is a termlist, so we use "name"
            $table->string("name", 50);
        });

        // pivot table
        Schema::create('animal_treatment', function (Blueprint $table) {
            $table->id();
            // create the animal id column and foreign key
            $table->foreignId("animal_id")->constrained()->onDelete("cascade");
            // create the treatment id column and foreign key
            $table->foreignId("treatment_id")->constrained()->onDelete("cascade");            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   // As a general rule, if you’re creating multiple tables, you should always drop them in reverse order.
        // remove the pivot table first, otherwise all the treatments foreign key contraints would fail
        Schema::dropIfExists('animal_treatment');
        Schema::dropIfExists('treatments');
    }
}
