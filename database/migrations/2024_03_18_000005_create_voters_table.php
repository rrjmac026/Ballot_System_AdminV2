<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('voters', function (Blueprint $table) {
            $table->bigIncrements('voter_id');
            $table->string('name');
            $table->string('student_number')->unique();
            $table->string('email')->unique();
            $table->unsignedBigInteger('college_id')->index(); // Indexed for performance
            $table->string('course');
            $table->integer('year_level');
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->string('passkey');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->timestamps();
            $table->softDeletes(); // ✅ Soft delete for safer data handling

            $table->foreign('college_id')
                  ->references('college_id')
                  ->on('colleges')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('voters');
    }
};
