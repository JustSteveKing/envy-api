<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Payloads\NewDevice;
use App\Models\Device;
use App\Repositories\DeviceRepository;
use Illuminate\Database\Eloquent\Model;
use Throwable;

final readonly class DeviceService
{
    /**
     * @param DeviceRepository $repository
     */
    public function __construct(
        private DeviceRepository $repository,
    ) {}

    /**
     * @param string $user
     * @param NewDevice $device
     * @return Model|Device
     * @throws Throwable
     */
    public function register(string $user, NewDevice $device): Model|Device
    {
        return $this->repository->create(
            attributes: [
                ...$device->toArray(),
                'user_id' => $user,
            ],
        );
    }
}
