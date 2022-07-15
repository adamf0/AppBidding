<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('user')) {
            Schema::enableForeignKeyConstraints();
            Schema::create('user', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->unsignedBigInteger('profileId')->nullable();
                $table->rememberToken();
                $table->timestamps();

                $table->foreign('profileId')
                ->references('id')->on('profile')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            });
        }
        // Artisan::call('db:seed', [
        //     '--class' => 'UserSeeder',
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
