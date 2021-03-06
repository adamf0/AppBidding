<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;
    protected $table = 'bid';
    
    public function user(){
        return $this->hasMany(User::class, 'userId');
    }

    public function auctionItem(){
        return $this->hasMany(AuctionItem::class, 'auctionItemId');
    }
}
