<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('casted_votes', function (Blueprint $table) {
            $table->bigIncrements('casted_vote_id');
            $table->unsignedBigInteger('voter_id');
            $table->unsignedBigInteger('position_id');
            $table->unsignedBigInteger('candidate_id');
            $table->string('vote_hash');
            $table->ipAddress('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamp('voted_at');
            $table->timestamps();

            $table->foreign('voter_id')
                  ->references('voter_id')
                  ->on('voters')
                  ->onDelete('cascade');
            $table->foreign('position_id')
                  ->references('position_id')
                  ->on('positions')
                  ->onDelete('cascade');
            $table->foreign('candidate_id')
                  ->references('candidate_id')
                  ->on('candidates')
                  ->onDelete('cascade');
            
            // Ensure a voter can only vote once for each position
            $table->unique(['voter_id', 'position_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('casted_votes');
    }
};
