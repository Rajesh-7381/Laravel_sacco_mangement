<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
            $table->string('surename')->nullable();
            
            $table->string('email')->nullable();
            $table->string('bdo_date');
            $table->string('mobile_number');
            $table->string('profile_image');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->tinyInteger('is_role'); //0-staff and 1-admin
            // $table->tinyInteger('is_delete');  add manually is_delete default ->0
            // $table->string('social_id')->nullable();
            // $table->string('social_type')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
