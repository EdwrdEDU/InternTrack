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
        Schema::create('requirements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('intern_id')->constrained()->onDelete('cascade');
            $table->boolean('pds')->default(false);
            $table->boolean('waiver')->default(false);
            $table->boolean('med_cert')->default(false);
            $table->boolean('moa')->default(false);
            $table->boolean('photo_2x2')->default(false);
            $table->boolean('accomplishment_report')->default(false);
            $table->boolean('certificate_of_completion')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirements');
    }
};
