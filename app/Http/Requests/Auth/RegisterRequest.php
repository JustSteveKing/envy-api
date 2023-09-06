<?php

declare(strict_types=1);

namespace App\Http\Requests\Auth;

use App\Http\Payloads\NewUser;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

final class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:2',
                'max:255',
            ],
            'email' => [
                'required',
                'string',
                'email',
                Rule::unique(
                    table: 'users',
                    column: 'email',
                ),
            ],
            'password' => [
                'required',
                'string',
                Password::default(),
            ]
        ];
    }

    public function payload(): NewUser
    {
        return NewUser::fromRequest(
            data: [
                'name' => $this->string('name')->toString(),
                'email' => $this->string('email')->toString(),
                'password' => Hash::make(
                    value: $this->string('password')->toString(),
                ),
            ],
        );
    }
}
