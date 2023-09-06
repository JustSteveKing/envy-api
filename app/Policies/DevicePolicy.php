<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Device;
use App\Models\User;
use Illuminate\Auth\Access\Response;

final class DevicePolicy
{
    public function view(User $user, Device $device): bool
    {
        return $device->user_id === $user->id;
    }
}
