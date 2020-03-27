<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGlobalConstraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->foreign('lesson_type_id')->references('id')->on('lesson_types');
            $table->foreign('course_section_id')->references('id')->on('course_sections');
        });

        Schema::table('course_sections', function (Blueprint $table) {
            $table->foreign('course_id')->references('id')->on('courses');
        });

        Schema::table('courses', function (Blueprint $table) {
            $table->foreign('course_category_id')->references('id')->on('course_categories');
            $table->foreign('difficulty_level_id')->references('id')->on('difficulty_levels');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('costumer_id')->references('id')->on('costumers');
            $table->foreign('order_status_id')->references('id')->on('order_statuses');
            $table->foreign('payment_id')->references('id')->on('payments');
        });

        Schema::table('order_courses', function (Blueprint $table) {
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('costumer_id')->references('id')->on('costumers');
        });

        Schema::table('quizzes', function (Blueprint $table) {
            $table->foreign('course_section_id')->references('id')->on('course_sections');
        });

        Schema::table('questions', function (Blueprint $table) {
            $table->foreign('question_type_id')->references('id')->on('question_types');
            $table->foreign('quiz_id')->references('id')->on('quizzes');
        });

        Schema::table('question_options', function (Blueprint $table) {
            $table->foreign('question_id')->references('id')->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
