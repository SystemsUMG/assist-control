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
        Schema::table('course_in_semesters', function (Blueprint $table) {
            $table
                ->foreign('semester_id')
                ->references('id')
                ->on('semesters');
            $table
                ->foreign('course_id')
                ->references('id')
                ->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_in_semesters', function (Blueprint $table) {
            $table->dropForeign(['semester_id']);
            $table->dropForeign(['course_id']);
        });
    }
};
