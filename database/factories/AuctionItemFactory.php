<?php

namespace Database\Factories;

use App\Models\AuctionItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuctionItemFactory extends Factory
{
    protected $model = AuctionItem::class;

    public function definition()
    {
        return [
            'nama_barang' => $this->faker->unique()->word(),
            'harga' => $this->faker->randomDigit(),
            // 'userId' => User::factory()
        ];
    }
}
