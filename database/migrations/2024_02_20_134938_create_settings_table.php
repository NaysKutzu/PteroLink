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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            // Host
            $table->string('name');
            $table->string('logo');
            // SMTP
            $table->enum('enable_smtp', ['true', 'false']);
            $table->string('smtpHost');
            $table->string('smtpPort');
            $table->enum('smtpSecure', ['tls', 'ssl']);
            $table->string('smtpUsername');
            $table->string('smtpPassword');
            $table->string('fromEmail');
            // Ptero Creds
            $table->string('PterodactylURL');
            $table->string('PterodactylAPIKey');
            // Def Resources
            $table->integer('def_coins');
            $table->integer('def_memory');
            $table->integer('def_disk_space');
            $table->integer('def_cpu');
            $table->integer('def_server_limit');
            $table->integer('def_port');
            $table->integer('def_db');
            $table->integer('def_backups');
            // Store
            $table->enum('store_enabled', ['true', 'false']);
            $table->integer('price_memory');
            $table->integer('price_cpu');
            $table->integer('price_disk_space');
            $table->integer('price_server_limit');
            $table->integer('price_allocation');
            $table->integer('price_database');
            $table->integer('price_backup');

            $table->integer('afk_min');
            $table->integer('afk_coins_per_min');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
