<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Device;
use App\Policies\DevicePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

final class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Device::class => DevicePolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
