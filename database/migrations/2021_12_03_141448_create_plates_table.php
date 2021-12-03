<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plates', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // sintassi completa per ovviare a problematiche di laravel con i plurali 
            $table->unsignedBigInteger('plate_type_id');
            $table->foreign('plate_type_id')
                  ->references('id')
                  ->on('plates_types')->onDelete('cascade');

            $table->string("name");
            $table->text("description")->nullable();
            $table->text("ingredients");
            $table->float("price",6,2,true);
            $table->boolean("availability")->default(true);
            $table->string('img_path')->nullable();
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
        Schema::dropIfExists('plates');
    }
}
