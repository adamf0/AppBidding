<?php

namespace App\Domain\UseCases\CreateUser;

use App\Domain\Interfaces\UserEntity;

class CreateUserResponseModel
{
    private UserEntity $user;

    public function __construct(UserEntity $user)
    {
        $this->user = $user;
    }

    public function getUser(): UserEntity
    {
        return $this->user;
    }
}