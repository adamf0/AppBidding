<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuctionItem extends Model
{
    use HasFactory;
    protected $table = 'auction_item';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function bid(){
        return $this->belongsTo(Bid::class);
    }
}
