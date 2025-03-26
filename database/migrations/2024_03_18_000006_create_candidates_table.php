<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->bigIncrements('candidate_id');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->unsignedBigInteger('position_id');
            $table->unsignedBigInteger('partylist_id')->nullable();
            $table->unsignedBigInteger('college_id');
            $table->string('course');
            $table->string('photo')->nullable();
            $table->text('platform')->nullable();
            $table->string('photo_path')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('position_id')
                  ->references('position_id')
                  ->on('positions')
                  ->onDelete('cascade');
            $table->foreign('partylist_id')
                  ->references('partylist_id')
                  ->on('partylists')
                  ->onDelete('cascade');
            $table->foreign('college_id')
                  ->references('college_id')
                  ->on('colleges')
                  ->onDelete('cascade');

            // Add unique constraint for candidate names
            $table->unique(['first_name', 'middle_name', 'last_name'], 'unique_candidate_name');
        });
    }

    public function down()
    {
        Schema::dropIfExists('candidates');
    }
};
