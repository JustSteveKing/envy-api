<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Shell;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read Shell $resource
 */
final class ShellResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->resource->name,
        ];
    }
}
