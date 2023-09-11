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
        Schema::create('empdetails', function (Blueprint $table) {
            $table->id();
            $table->string('tokenNo', 200);
            $table->string('sname', 200);
            $table->string('fullName', 200);
            $table->string('category', 200);
            $table->string('setOrder', 200);
            $table->string('status', 200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empdetails');
    }
};
