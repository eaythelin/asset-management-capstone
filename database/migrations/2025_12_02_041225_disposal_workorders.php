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
        Schema::create('disposal_workorders', function(Blueprint $table){
            $table->id();
            $table->foreignId('workorder_id')->constrained('workorders')->onDelete('restrict');
            $table->foreignId('asset_id')->constrained('assets')->onDelete('restrict');
            $table->string('disposal_method');
            $table->date('disposal_date');
            $table->text('disposal_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disposal_workorders');
    }
};
