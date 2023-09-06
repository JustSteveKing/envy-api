<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Concerns\Repositories\HasDatabase;
use App\Models\ShellConfig;
use Illuminate\Database\Eloquent\Model;
use Throwable;

final class ConfigRepository
{
    use HasDatabase;

    /**
     * @param string $data
     * @param string $shell
     * @param string $device
     * @return ShellConfig|Model
     * @throws Throwable
     */
    public function create(string $data, string $shell, string $device): ShellConfig|Model
    {
        return $this->database->transaction(
            callback: fn () => ShellConfig::query()->create([
                'data' => $data,
                'shell_id' => $shell,
                'device_id' => $device,
            ]),
            attempts: 2,
        );
    }
}
