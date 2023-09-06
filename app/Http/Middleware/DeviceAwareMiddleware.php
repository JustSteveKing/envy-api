<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Exceptions\DeviceNotDefined;
use App\Models\Device;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use JustSteveKing\Tools\Http\Enums\Status;
use Symfony\Component\HttpFoundation\Response;

final class DeviceAwareMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->has(key: 'X-ENVY-DEVICE')) {
            throw new DeviceNotDefined(
                message: 'Ensure you send the Device identifier as a "X-ENVY-DEVICE" header.',
                code: Status::BAD_REQUEST->value,
            );
        }

        Cache::forever(
            key: $identifier = $request->header(key: 'X-ENVY-DEVICE'),
            value: Device::query()
                ->with(['configs.shell'])
                ->where('identifier', $identifier)
                ->firstOrFail(),
        );

        return $next($request);
    }
}
