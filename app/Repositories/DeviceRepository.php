<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Concerns\Repositories\HasDatabase;
use App\Models\Device;
use Illuminate\Database\Eloquent\Model;
use Throwable;

final readonly class DeviceRepository
{
    use HasDatabase;

    /**
     * @param array $attributes
     * @return Model|Device
     * @throws Throwable
     */
    public function create(array $attributes): Model|Device
    {
        return $this->database->transaction(
            callback: fn () => Device::query()->create(
                attributes: $attributes,
            ),
            attempts: 2,
        );
    }
}
