<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->bigIncrements('organization_id');
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('college_id');
            $table->foreign('college_id')->references('college_id')->on('colleges')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('organizations');
    }
};
