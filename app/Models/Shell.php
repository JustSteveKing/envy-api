<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $id
 * @property string $name
 * @property null|CarbonInterval $created_at
 * @property null|CarbonInterval $updated_at
 * @property Collection<Shell> $configs
 */
final class Shell extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'name',
    ];

    public function configs(): HasMany
    {
        return $this->hasMany(
            related: ShellConfig::class,
            foreignKey: 'shell_id',
        );
    }
}
