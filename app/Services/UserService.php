<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Payloads\NewUser;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Model;
use Throwable;

final readonly class UserService
{
    /**
     * @param UserRepository $repository
     */
    public function __construct(
        private UserRepository $repository,
    ) {}

    /**
     * @param NewUser $user
     * @return User|Model
     * @throws Throwable
     */
    public function register(NewUser $user): User|Model
    {
        return $this->repository->create(
            user: $user,
        );
    }
}
