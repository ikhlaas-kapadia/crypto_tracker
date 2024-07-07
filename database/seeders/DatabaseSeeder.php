<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Portfolio;
use App\Models\Transaction;
use Database\Factories\TransactionFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->has(Portfolio::factory()->count(1))
        ->create();

        Transaction::factory()->create();
    }
}
