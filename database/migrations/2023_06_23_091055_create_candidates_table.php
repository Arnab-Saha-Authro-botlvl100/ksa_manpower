<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('passport_number');
            $table->date('passport_issue_date');
            $table->date('passport_expire_date');
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->string('father');
            $table->string('mother');
            $table->string('religion');
            $table->string('married');
            $table->string('gender');
            $table->string('address');
            $table->string('medical_center');
            $table->date('medical_issue_date');
            $table->date('medical_expire_date');
            $table->string('driving_licence');
            $table->string('police_clearance');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('candidates');
    }
};
