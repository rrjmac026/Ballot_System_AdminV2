<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('casted_votes', function (Blueprint $table) {
            $table->unsignedBigInteger('candidate_id')->after('position_id');
            $table->foreign('candidate_id')->references('candidate_id')->on('candidates')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('casted_votes', function (Blueprint $table) {
            $table->dropForeign(['candidate_id']);
            $table->dropColumn('candidate_id');
        });
    }
};
