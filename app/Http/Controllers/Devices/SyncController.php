<?php

declare(strict_types=1);

namespace App\Http\Controllers\Devices;

use App\Http\Resources\DeviceResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Treblle\ApiResponses\Responses\ModelResponse;

final class SyncController
{
    public function __invoke(Request $request): ModelResponse
    {
        $device = Cache::get($request->header(key: 'X-ENVY-DEVICE'));

        Gate::allows('view', $device);

        return new ModelResponse(
            data: new DeviceResource(
                resource: $device,
            ),
        );
    }
}
