<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('career_in_centers', function (Blueprint $table) {
            $table
                ->foreign('center_id')
                ->references('id')
                ->on('centers');
            $table
                ->foreign('career_id')
                ->references('id')
                ->on('careers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('career_in_centers', function (Blueprint $table) {
            $table->dropForeign(['center_id']);
            $table->dropForeign(['career_id']);
        });
    }
};
