<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->timestamp('election_start')->nullable();
            $table->timestamp('election_end')->nullable();
            $table->boolean('maintenance_mode')->default(false);
            $table->boolean('registration_enabled')->default(true);
            $table->boolean('voting_enabled')->default(false);
            $table->boolean('results_enabled')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
