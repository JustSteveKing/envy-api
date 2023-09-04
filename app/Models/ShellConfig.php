<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $id
 * @property null|AsArrayObject $data
 * @property string $device_id
 * @property string $shell_id
 * @property null|CarbonInterface $created_at
 * @property null|CarbonInterface $updated_at
 * @property Device $device
 * @property Shell $shell
 */
final class ShellConfig extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'data',
        'device_id',
        'shell_id',
    ];

    protected $casts = [
        'data' => AsArrayObject::class,
    ];

    public function device(): BelongsTo
    {
        return $this->belongsTo(
            related: Device::class,
            foreignKey: 'device_id',
        );
    }

    public function shell(): BelongsTo
    {
        return $this->belongsTo(
            related: Shell::class,
            foreignKey: 'shell_id',
        );
    }
}
