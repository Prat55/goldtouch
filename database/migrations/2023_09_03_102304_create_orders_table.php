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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('cname', 200);
            $table->text('cadd');
            $table->string('cgstin', 50);
            $table->text('cstyle_ref');
            $table->string('email1', 200);
            $table->string('email2', 200)->nullable();
            $table->string('email3', 200)->nullable();
            $table->string('email4', 200)->nullable();
            $table->string('email5', 200)->nullable();
            $table->string('phone1', 50);
            $table->string('phone2', 50)->nullable();
            $table->string('phone3', 50)->nullable();
            $table->string('phone4', 50)->nullable();
            $table->string('phone5', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
