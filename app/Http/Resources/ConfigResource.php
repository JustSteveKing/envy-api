<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\ShellConfig;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read ShellConfig $resource
 */
final class ConfigResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->resource->data,
            'shell' => new ShellResource(
                resource: $this->whenLoaded(
                    relationship: 'shell',
                ),
            ),
        ];
    }
}
