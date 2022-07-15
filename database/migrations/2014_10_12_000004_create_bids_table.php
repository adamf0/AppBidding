<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('bid')) {
            Schema::enableForeignKeyConstraints();
            Schema::create('bid', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('auctionItemId')->nullable();
                $table->unsignedBigInteger('userId')->nullable();
                $table->bigInteger('harga_tawar');
                $table->timestamps();

                $table->foreign('auctionItemId')
                ->references('id')->on('auction_item')
                ->onUpdate('cascade')
                ->onDelete('cascade');

                $table->foreign('userId')
                ->references('id')->on('user')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bids');
    }
}
