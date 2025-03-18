<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('colleges', function (Blueprint $table) {
            $table->id('college_id');
            $table->string('name')->unique();
            $table->string('acronym', 10)->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('colleges');
    }
};
