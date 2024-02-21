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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['USER', 'ADMIN']);
            $table->integer('coins');
            $table->integer('memory');
            $table->integer('disk');
            $table->integer('cpu');
            $table->integer('servers');
            $table->integer('backups');
            $table->integer('datbases');
            $table->integer('ptero_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
