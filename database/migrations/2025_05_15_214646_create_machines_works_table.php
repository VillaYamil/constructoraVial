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
        Schema::create('machines_works', function (Blueprint $table) {
            $table->id();
            
            $table->date('start_date');
            $table->date('end_date');
            $table->string('reason_end');
            $table->integer('kilometers');

            $table->foreignId('machine_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('works_id')
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
        Schema::dropIfExists('machines_works');
    }
};
