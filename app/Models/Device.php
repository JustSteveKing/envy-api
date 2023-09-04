<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $id
 * @property string $name
 * @property string $type
 * @property string $os
 * @property string $architecture
 * @property string $identifier
 * @property bool $default
 * @property string $user_id
 * @property null|CarbonInterface $synced_at
 * @property null|CarbonInterface $created_at
 * @property null|CarbonInterface $updated_at
 * @property User $user
 * @property Collection<ShellConfig> $configs
 */
final class Device extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'name',
        'type',
        'os',
        'architecture',
        'identifier',
        'default',
        'user_id',
        'synced_at',
    ];

    protected $casts = [
        'default' => 'boolean',
        'synced_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id'
        );
    }

    public function configs(): HasMany
    {
        return $this->hasMany(
            related: ShellConfig::class,
            foreignKey: 'device_id',
        );
    }
}
