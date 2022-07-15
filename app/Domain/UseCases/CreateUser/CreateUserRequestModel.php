<?php

namespace App\Domain\UseCases\CreateUser;

class CreateUserRequestModel
{
    private array $attributes;

    public function __construct(
        array $attributes
    ) {
        $this->attributes = $attributes;
    }

    public function getName(): string
    {
        return $this->attributes['name'] ?? '';
    }

    public function getEmail(): string
    {
        return $this->attributes['email'] ?? '';
    }

    public function getPassword(): string
    {
        return $this->attributes['password'] ?? '';
    }
}