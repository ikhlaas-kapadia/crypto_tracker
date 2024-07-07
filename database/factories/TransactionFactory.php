<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Portfolio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
    
        return [
            //
            'user_id' =>  1,
            'portfolio_id' => 1,
            'date' => now(),
            'coin_name' => 'bitcoin',
            'ticker' => 'btc', 
            'type' => 'buy',
            'price' => 10000,
            'units' => 1,
            'currency' => 'usd'
        ];
    }
}
