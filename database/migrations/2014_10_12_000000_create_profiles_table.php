<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('profile')) {
            Schema::create('profile', function (Blueprint $table) {
                $table->id();
                $table->string('nama_lengkap');
                $table->boolean('jenis_kelamin');
                $table->date('tanggal_lahir')->format('Y-m-d');
                $table->string('saldo');
                $table->timestamps();
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
        Schema::dropIfExists('profiles');
    }
}
