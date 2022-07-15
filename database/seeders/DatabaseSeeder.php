<?php

namespace Database\Seeders;

use App\Models\AuctionItem;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(rand(1,10))->create()->each(function ($user) {
            AuctionItem::factory()->count(rand(1,10))->create()->each(function ($auctionItem) use($user){
                $user->auctionItem()->save($auctionItem);
            });
            // $auctionItem = AuctionItem::factory()->count(4)->make();
            // $user->auctionItem()->saveMany($auctionItem);
        });
    }
}
