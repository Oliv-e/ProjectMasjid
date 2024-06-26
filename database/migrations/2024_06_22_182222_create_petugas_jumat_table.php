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
        Schema::create('petugas_jumat', function (Blueprint $table) {
            $table->id();
            $table->string('khotib')->nullable();
            $table->string('imam')->nullable();
            $table->string('muadzin')->nullable();
            $table->string('bilal')->nullable();
            $table->enum('display',['true','false']);
            $table->date('created_at');
            $table->date('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petugas_jumat');
    }
};
