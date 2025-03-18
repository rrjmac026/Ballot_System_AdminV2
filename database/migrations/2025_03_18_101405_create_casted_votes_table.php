<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('casted_votes', function (Blueprint $table) {
            $table->id('casted_vote_id');
            $table->foreignId('voter_id')->constrained('voters')->onDelete('cascade');
            $table->foreignId('candidate_id')->constrained('candidates')->onDelete('cascade');
            $table->foreignId('position_id')->constrained('positions')->onDelete('cascade');
            $table->string('election_type'); // Example: "SSC" or "SBO"
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('casted_votes');
    }
};
