<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('partylists', function (Blueprint $table) {
            $table->bigIncrements('partylist_id');
            $table->string('name');
            $table->string('acronym', 10);
            $table->text('description')->nullable();
            $table->string('logo_path')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('partylists');
    }
};
