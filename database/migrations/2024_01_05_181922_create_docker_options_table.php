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
        Schema::create('docker_options', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('docker_id');
            $table->string('name')->nullable();
            $table->string('value');
//            $table->string('domain_origin')->nullable();
            $table->boolean('job')->default(true);
            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docker_options');
    }
};
