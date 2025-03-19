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
            $table->unsignedBigInteger('position_id');
            $table->enum('election_type', ['Regular', 'Special']);
            $table->string('vote_hash');
            $table->timestamp('voted_at')->nullable();
            $table->timestamps();
            $table->foreign('voter_id')->references('voter_id')->on('voters')->onDelete('cascade');
            $table->foreign('position_id')->references('position_id')->on('positions')->onDelete('cascade');

            // Add unique constraint for voter_id and position_id combination
            $table->unique(['voter_id', 'position_id'], 'unique_voter_position_vote');
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('casted_votes');
    }
};
