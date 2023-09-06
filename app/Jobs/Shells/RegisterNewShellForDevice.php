<?php

declare(strict_types=1);

namespace App\Jobs\Shells;

use App\Http\Payloads\NewShell;
use App\Services\ShellService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Throwable;

final class RegisterNewShellForDevice implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * @param string $device
     * @param NewShell $shell
     */
    public function __construct(
        public readonly string $device,
        public readonly NewShell $shell,
    ) {}

    /**
     * @param ShellService $service
     * @return void
     * @throws Throwable
     */
    public function handle(ShellService $service): void
    {
        $service->register(
            device: $this->device,
            shell: $this->shell,
        );
    }
}
