<?php

declare(strict_types=1);

namespace App\Http\Payloads;

final readonly class NewUser
{
    /**
     * @param string $name
     * @param string $email
     * @param string $password
     */
    public function __construct(
        private string $name,
        private string $email,
        private string $password,
    ) {}

    /**
     * @return array{name:string,email:string,password:string}
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }

    /**
     * @param array{name:string,email:string,password:string} $data
     * @return NewUser
     */
    public static function fromRequest(array $data): NewUser
    {
        return new NewUser(
            name: $data['name'],
            email: $data['email'],
            password: $data['password'],
        );
    }
}
