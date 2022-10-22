<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career_in_centers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('career_code');
            $table->unsignedBigInteger('center_id');
            $table->unsignedBigInteger('career_id');
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
        Schema::dropIfExists('career_in_centers');
    }
};
