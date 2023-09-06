<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read Device $resource
 */
final class DeviceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->resource->name,
            'type' => $this->resource->type,
            'os' => $this->resource->os,
            'architecture' => $this->resource->architecture,
            'identifier' => $this->resource->identifier,
            'default' => $this->resource->default,
            'configurations' => ConfigResource::collection(
                resource: $this->whenLoaded(
                    relationship: 'configs',
                ),
            ),
            'last_synced' => new DateResource(
                resource: $this->resource->synced_at,
            ),
        ];
    }
}
