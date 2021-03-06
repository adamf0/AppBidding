<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuctionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('auction_item')) {
            Schema::enableForeignKeyConstraints();
            Schema::create('auction_item', function (Blueprint $table) {
                $table->id();
                $table->string('nama_barang');
                $table->bigInteger('harga');
                $table->unsignedBigInteger('userId')->nullable();
                $table->timestamps();

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
        Schema::dropIfExists('auction_items');
    }
}
