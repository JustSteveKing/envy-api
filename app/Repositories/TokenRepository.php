<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Concerns\Repositories\HasDatabase;
use App\Models\User;
use Laravel\Sanctum\NewAccessToken;
use Throwable;

final class TokenRepository
{
    use HasDatabase;

    /**
     * @param string $id
     * @param string $name
     * @param array $abilities
     * @return NewAccessToken
     * @throws Throwable
     */
    public function create(string $id, string $name, array $abilities = ['*']): NewAccessToken
    {
        return $this->database->transaction(
            callback: fn () => User::find(
                id: $id,
            )->createToken(
                name: $name,
                abilities: $abilities,
            ),
            attempts: 2,
        );
    }
}
