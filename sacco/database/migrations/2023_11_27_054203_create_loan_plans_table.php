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
        Schema::create('loan_plans', function (Blueprint $table) {
            $table->id();
            
            $table->integer('months');
            $table->integer('intrest_percentage');
            $table->integer('penalty_rate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_plans');
    }
};


// Schema::create('loans', function (Blueprint $table) {
//     $table->id();
//     $table->unsignedBigInteger('user_id');
//     $table->unsignedBigInteger('staff_id');
//     $table->unsignedBigInteger('loan_types_id');
//     $table->unsignedBigInteger('loan_plan_id');
//     $table->unsignedBigInteger('loan_amount');
//     $table->text('purpose');
//     $table->timestamps();
    
//     // Foreign key constraints
//     $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//     $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade');
//     $table->foreign('loan_types_id')->references('id')->on('loan_types')->onDelete('cascade');
//     $table->foreign('loan_plan_id')->references('id')->on('loan_plans')->onDelete('cascade');
// });
