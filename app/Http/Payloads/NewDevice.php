<?php

declare(strict_types=1);

namespace App\Http\Payloads;

final class NewDevice
{
    public function __construct(
        private readonly string $name,
        private readonly string $type,
        private readonly string $os,
        private readonly string $architecture,
        private readonly string $identifier,
        private readonly bool $default = true,
    ) {}

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'os' => $this->os,
            'architecture' => $this->architecture,
            'identifier' => $this->identifier,
            'default' => $this->default,
        ];
    }

    /**
     * @param array{name:string,type:string,os:string,architecture:string,identifier:string,default:null|bool} $data
     * @return NewDevice
     */
    public static function fromRequest(array $data): NewDevice
    {
        return new NewDevice(
            name: $data['name'],
            type: $data['type'],
            os: $data['os'],
            architecture: $data['architecture'],
            identifier: $data['identifier'],
            default: $data['default'] ?? true,
        );
    }
}
