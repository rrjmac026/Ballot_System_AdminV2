<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::dropIfExists('casted_votes');
        
        Schema::create('casted_votes', function (Blueprint $table) {
            $table->id('casted_vote_id');
            $table->string('transaction_number');
            $table->foreignId('voter_id');
            $table->foreignId('position_id');
            $table->foreignId('candidate_id');
            $table->string('vote_hash');
            $table->timestamp('voted_at');
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamps();

            $table->foreign('voter_id')->references('voter_id')->on('voters');
            $table->foreign('position_id')->references('position_id')->on('positions');
            $table->foreign('candidate_id')->references('candidate_id')->on('candidates');
        });
    }

    public function down()
    {
        Schema::dropIfExists('casted_votes');
    }
};
