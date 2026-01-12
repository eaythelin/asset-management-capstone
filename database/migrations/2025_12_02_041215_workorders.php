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
        Schema::create('workorders', function(Blueprint $table){
            $table->id();
            $table->foreignId('request_id')->nullable()->constrained('requests')->onDelete('set null');
            $table->foreignId('completed_by')->nullable()->constrained('users', 'id')->onDelete('restrict');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            //enums
            $table->string('priority_level')->default('low');
            $table->string('type');
            $table->string('status')->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workorders');
    }
};
