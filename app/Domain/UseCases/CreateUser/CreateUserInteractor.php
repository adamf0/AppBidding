<?php

namespace App\Domain\UseCases\CreateUser;

use App\Domain\Interfaces\UserEntity;
use App\Domain\Interfaces\UserFactory;
use App\Domain\Interfaces\UserRepository;
use App\Domain\Interfaces\ViewModel;
use App\Models\PasswordValueObject;
use App\Domain\UseCases\CreateUser\CreateUserInputPort;

class CreateUserInteractor implements CreateUserInputPort
{
    private CreateUserOutputPort $output;
    private UserRepository $repository;
    private UserFactory $factory;

    public function __construct( //injeksi AppServiceProvider line 30 "$app->make(UseCases\CreateUser\CreateUserInteractor::class, ["
        CreateUserOutputPort $output,
        UserRepository $repository,
        UserFactory $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function createUser(CreateUserRequestModel $model): ViewModel
    {
        $user = $this->factory->make([
            'name' => $model->getName(),
            'email' => $model->getEmail(),
        ]);    
        
        if ($this->repository->exists($user)) {
            return $this->output->userAlreadyExists(new CreateUserResponseModel($user)); //menjalankan Adapters\Presenters\CreateUserHttpPresenter.php line 24
        }

        try {
            $user = $this->repository->create($user, new PasswordValueObject($model->getPassword()));
        } catch (\Exception $e) {
            return $this->output->unableToCreateUser(new CreateUserResponseModel($user), $e); //menjalankan Adapters\Presenters\CreateUserHttpPresenter.php line 32
        }

        return $this->output->userCreated(
            new CreateUserResponseModel($user) //menjalankan Adapters\Presenters\CreateUserHttpPresenter.php line 16
        );
    }
}