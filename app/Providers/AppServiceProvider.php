<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind( //binding global
            Domain\Interfaces\UserFactory::class, //siapa yg call Interfaces\UserFactory
            Factories\UserModelFactory::class, //return Factories\UserModelFactory 
        );

        $this->app->bind( //binding global
            Domain\Interfaces\UserRepository::class, //siapa yg call Interfaces\UserRepository
            Repositories\UserDatabaseRepository::class, //return Repositories\UserDatabaseRepository
        );

        $this->app
            ->when(HttpControllers\CreateUserController::class) //ketika CreateUserController di call
            ->needs(UseCases\CreateUser\CreateUserInputPort::class) //injeksi UseCases\CreateUser\CreateUserInputPort & siapa yg call
            ->give(function ($app) {
                return $app->make(UseCases\CreateUser\CreateUserInteractor::class, //return UseCases\CreateUser\CreateUserInteractor
                [
                    'output' => $app->make(Presenters\CreateUserHttpPresenter::class), //injeksi variable $output dengan Presenters\CreateUserHttpPresenter 
                ]);
            });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
