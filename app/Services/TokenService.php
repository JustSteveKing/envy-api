<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\TokenRepository;
use Laravel\Sanctum\NewAccessToken;
use Throwable;

final readonly class TokenService
{
    /**
     * @param TokenRepository $repository
     */
    public function __construct(
        private TokenRepository $repository,
    ) {}

    /**
     * @param string $name
     * @param array $abilities
     * @return NewAccessToken
     * @throws Throwable
     */
    public function createNew(string $id, string $name, array $abilities = ['*']): NewAccessToken
    {
        return $this->repository->create(
            id: $id,
            name: $name,
            abilities: $abilities,
        );
    }
}
