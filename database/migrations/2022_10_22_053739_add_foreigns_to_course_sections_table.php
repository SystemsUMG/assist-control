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
        Schema::table('course_sections', function (Blueprint $table) {
            $table
                ->foreign('career_in_center_id')
                ->references('id')
                ->on('career_in_centers');
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users');
            $table
                ->foreign('course_id')
                ->references('id')
                ->on('courses');
            $table
                ->foreign('semester_id')
                ->references('id')
                ->on('semesters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_sections', function (Blueprint $table) {
            $table->dropForeign(['career_in_center_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['course_id']);
            $table->dropForeign(['semester_id']);
        });
    }
};
