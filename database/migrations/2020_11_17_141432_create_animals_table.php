<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string("name", 100);
            $table->string("type", 100);
            $table->date("date_of_birth");
            $table->decimal('weight', 8, 3); // up to 8 digits stored, and a precision of grams
            $table->decimal('height', 8, 3); // up to 8 digits stored, and a precision of milimetres
            $table->enum('biteyness', [1, 2, 3, 4, 5]);
            $table->foreignId("owner_id")->constrained()->onDelete("cascade");
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
       Schema::dropIfExists('animals');
    }
}
