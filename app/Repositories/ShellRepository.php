<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Concerns\Repositories\HasDatabase;
use App\Models\Shell;
use Illuminate\Database\Eloquent\Model;
use Throwable;

final class ShellRepository
{
    use HasDatabase;

    /**
     * @param string $name
     * @return Model|Shell
     * @throws Throwable
     */
    public function create(string $name): Model|Shell
    {
        return $this->database->transaction(
            callback: fn () => Shell::query()->updateOrCreate(
                attributes: [
                    'name' => $name,
                ],
            ),
            attempts: 2,
        );
    }
}
