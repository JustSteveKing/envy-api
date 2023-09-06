<?php

declare(strict_types=1);

namespace App\Jobs\Auth;

use App\Http\Payloads\NewUser;
use App\Services\UserService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Throwable;

final class RegisterNewUser implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * @param NewUser $user
     */
    public function __construct(
        public readonly NewUser $user,
    ) {}

    /**
     * @param UserService $service
     * @return void
     * @throws Throwable
     */
    public function handle(UserService $service): void
    {
        $user = $service->register(
            user: $this->user,
        );

        \event(new Registered(
            user: $user,
        ));
    }
}
