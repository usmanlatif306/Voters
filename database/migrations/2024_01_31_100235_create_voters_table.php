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
        Schema::create('voters', function (Blueprint $table) {
            $table->id();
            $table->string('block');
            $table->string('serial_number');
            $table->string('family_number');
            $table->string('name');
            $table->string('father_name');
            $table->string('cnic')->unique();
            $table->string('gender');
            $table->boolean('confirmed')->default(false);
            $table->boolean('casted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voters');
    }
};
