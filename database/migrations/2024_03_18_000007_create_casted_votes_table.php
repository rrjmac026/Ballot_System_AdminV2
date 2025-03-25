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
            $table->string('transaction_number');
            $table->unsignedBigInteger('voter_id');
            $table->json('votes'); // Store votes as JSON: {"position_id": "candidate_id"}
            $table->string('vote_hash');
            $table->timestamp('voted_at');
            $table->timestamps();

            $table->foreign('voter_id')
                ->references('voter_id')
                ->on('voters')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('casted_votes');
    }
};

