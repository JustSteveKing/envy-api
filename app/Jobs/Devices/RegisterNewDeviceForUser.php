<?php

declare(strict_types=1);

namespace App\Jobs\Devices;

use App\Exceptions\Devices\FailedToCreateDevice;
use App\Http\Payloads\NewDevice;
use App\Services\DeviceService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Throwable;

final class RegisterNewDeviceForUser implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        public readonly string $user,
        public readonly NewDevice $device,
    ) {}

    /**
     * @param DeviceService $service
     * @return void
     * @throws FailedToCreateDevice
     */
    public function handle(DeviceService $service): void
    {
        try {
            $service->register(
                user: $this->user,
                device: $this->device,
            );
        } catch (Throwable $exception) {
            throw new FailedToCreateDevice(
                message: $exception->getMessage(),
                previous: $exception,
            );
        }
    }
}
