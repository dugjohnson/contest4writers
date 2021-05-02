<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinalScoresheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('final_scoresheets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('lookup_code',6);
            $table->integer('entry_id');
            $table->integer('final_judge_id')->nullable();
            $table->boolean('published');
            $table->text('category');
            $table->text('title');
            $table->text('scoresheetData')->nullable();
            $table->smallInteger('finalScore')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('final_scoresheets');
    }
}
