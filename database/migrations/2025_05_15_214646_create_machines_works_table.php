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
        Schema::create('machine_works', function (Blueprint $table) {
            $table->id();
            
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('reason_end')->nullable();
            $table->integer('km_start')->nullable();
            $table->integer('km_end')->nullable();

            $table->foreignId('machine_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('work_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('machine_works');
    }
};
