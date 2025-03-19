<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->bigIncrements('candidate_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->unsignedBigInteger('partylist_id')->nullable();
            $table->foreign('partylist_id')->references('partylist_id')->on('partylists')->onDelete('set null');
            $table->unsignedBigInteger('organization_id');
            $table->foreign('organization_id')->references('organization_id')->on('organizations')->onDelete('cascade');
            $table->unsignedBigInteger('position_id');
            $table->foreign('position_id')->references('position_id')->on('positions')->onDelete('cascade');
            $table->unsignedBigInteger('college_id');
            $table->foreign('college_id')->references('college_id')->on('colleges')->onDelete('cascade');
            $table->string('course')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('candidates');
    }
};
