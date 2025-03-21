<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->bigIncrements('organization_id');
            $table->string('name');
            $table->string('acronym', 10);
            $table->text('description')->nullable();
            $table->unsignedBigInteger('college_id')->nullable(); // Add this line
            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('college_id')
                  ->references('college_id')
                  ->on('colleges')
                  ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('organizations');
    }
};
