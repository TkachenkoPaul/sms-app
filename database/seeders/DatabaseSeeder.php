<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\Subscriber;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Subscriber::factory()->count(1589)->create();
        Message::factory()->count(480)->create();
    }
}
