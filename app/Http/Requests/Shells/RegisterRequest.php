<?php

declare(strict_types=1);

namespace App\Http\Requests\Shells;

use App\Http\Payloads\NewShell;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'data' => [
                'required',
                'string',
            ],
            'device' => [
                'required',
                'string',
                Rule::exists(
                    table: 'devices',
                    column: 'identifier',
                )
            ]
        ];
    }

    public function payload(): NewShell
    {
        return NewShell::fromRequest(
            data: [
                'name' => $this->string('name')->toString(),
                'data' => $this->string('data')->toString(),
            ],
        );
    }
}
