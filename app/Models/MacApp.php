<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $name
 * @property null|CarbonInterface $created_at
 * @property null|CarbonInterface $updated_at
 */
final class MacApp extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'name',
    ];
}
