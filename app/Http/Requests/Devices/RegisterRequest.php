<?php

declare(strict_types=1);

namespace App\Http\Requests\Devices;

use App\Http\Payloads\NewDevice;
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
            'type' => [
                'required',
                'string',
                'min:2',
                'max:255',
            ],
            'os' => [
                'required',
                'string',
                'min:2',
                'max:255',
            ],
            'architecture' => [
                'required',
                'string',
                'min:2',
                'max:255',
            ],
            'identifier' => [
                'required',
                'string',
                'min:2',
                'max:255',
                Rule::unique(
                    table: 'devices',
                    column: 'identifier',
                )
            ],
        ];
    }

    public function payload(): NewDevice
    {
        return NewDevice::fromRequest(
            data: [
                'name' => $this->string('name')->toString(),
                'type' => $this->string('type')->toString(),
                'os' => $this->string('os')->toString(),
                'architecture' => $this->string('architecture')->toString(),
                'identifier' => $this->string('identifier')->toString(),
                'default' => $this->has('default') ? $this->boolean('default') : null,
            ]
        );
    }
}
