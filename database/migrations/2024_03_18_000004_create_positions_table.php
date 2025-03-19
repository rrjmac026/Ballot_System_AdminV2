<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->bigIncrements('position_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('organization_id')->nullable();
            $table->integer('max_votes')->default(1);
            $table->integer('position_order')->default(0);
            $table->timestamps();
            
            $table->foreign('organization_id')
                  ->references('organization_id')
                  ->on('organizations')
                  ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('positions');
    }
};
