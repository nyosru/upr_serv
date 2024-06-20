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
        Schema::create('caddyfile_domains', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('caddyfile_id');
            $table->string('domain');
            $table->string('domain_origin')->nullable();
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
        Schema::dropIfExists('caddyfile_domains');
    }
};
