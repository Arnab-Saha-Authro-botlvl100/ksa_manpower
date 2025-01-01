<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisaTable extends Migration
{
    public function up()
    {
        Schema::create('visa', function (Blueprint $table) {
            $table->id();
            $table->string('visa_no');
            $table->unsignedBigInteger('candidate_id');
            $table->unsignedBigInteger('sponsor_id');
            $table->date('visa_date');
            $table->string('salary');
            $table->string('sponsor_name_arabic');
            $table->string('sponsor_name_english');
            $table->string('profession_arabic');
            $table->string('profession_english');
            $table->string('mofa_no');
            $table->date('mofa_date');
            $table->string('okala_no');
            $table->string('musaned_no');
            $table->timestamps();
            $table->foreign('candidate_id')->references('id')->on('candidates');
        });
    }

    public function down()
    {
        Schema::dropIfExists('visa');
    }
}
