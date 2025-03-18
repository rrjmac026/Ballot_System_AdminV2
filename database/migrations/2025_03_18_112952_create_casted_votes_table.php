<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('casted_votes', function (Blueprint $table) {
            $table->bigIncrements('casted_vote_id');
            $table->unsignedBigInteger('voter_id');
            $table->foreign('voter_id')->references('voter_id')->on('voters')->onDelete('cascade');
            $table->unsignedBigInteger('candidate_id');
            $table->foreign('candidate_id')->references('candidate_id')->on('candidates')->onDelete('cascade');
            $table->unsignedBigInteger('position_id');
            $table->foreign('position_id')->references('position_id')->on('positions')->onDelete('cascade');
            $table->string('election_type'); // Example: "SSC" or "SBO"
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('casted_votes');
    }
};
