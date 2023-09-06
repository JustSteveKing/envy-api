<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Concerns\Repositories\HasDatabase;
use App\Http\Payloads\NewUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Throwable;

final class UserRepository
{
    use HasDatabase;

    /**
     * @param NewUser $user
     * @return User|Model
     * @throws Throwable
     */
    public function create(NewUser $user): User|Model
    {
        return $this->database->transaction(
            callback: fn () => User::query()->create(
                attributes: $user->toArray(),
            ),
            attempts: 2,
        );
    }
}
