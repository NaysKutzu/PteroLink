<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role' => 'USER',
            'coins' => 300,
            'memory' => 300,
            'disk' => 300,
            'cpu' => 300,
            'servers' => 300,
            'backups' => 300,
            'datbases' => 300,
            'ptero_id' => 2,
        ]);

        \App\Models\Settings::factory()->create([
            'name' => 'PteroLink',
            'logo' => 'https://youtube.com',
            'enable_smtp' => 'true',
            'smtpHost' => 'mail.pylexnodes.net',
            'smtpPort' => '24',
            'smtpSecure' => 'tls',
            'smtpUsername' => 'no-reply@pylexnodes.net',
            'smtpPassword' => 'Pizza2008!',
            'fromEmail' => 'no-reply@pylexnodes.net',
            'PterodactylURL' => 'https://panel.nyxalis.pro',
            'PterodactylAPIKey' => 'pla_xxx',
            'def_coins' => '200',
            'def_memory' => '2048',
            'def_disk_space' => '5120',
            'def_cpu' => '200',
            'def_server_limit' => '2',
            'def_db' => '1',
            'def_backups' => '1',
            'store_enabled' => 'true',
            'price_memory' => '50',
            'price_cpu' => '50',
            'price_disk_space' => '50',
            'price_server_limit' => '50',
            'price_database' => '50',
            'price_backup' => '50',
            'afk_min' => '1',
            'afk_coins_per_min' => '1',
        ]);
    }
}
