<?php

namespace App\Http\Requests;

use App\Models\EmailValueObject;
use App\Models\PasswordValueObject;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ["required"," string"],
            'email' => ["required"," email"," unique:user"],
            'password' => ["required", "string", "regex:" . PasswordValueObject::VALIDATION_REGEX],
        ];
    }
}