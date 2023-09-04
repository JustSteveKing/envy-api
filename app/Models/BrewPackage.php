<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $name
 * @property null|string $description
 * @property null|AsArrayObject $meta
 * @property null|CarbonInterface $created_at
 * @property null|CarbonInterface $updated_at
 */
final class BrewPackage extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'name',
        'description',
        'meta',
    ];

    protected $casts = [
        'meta' => AsArrayObject::class,
    ];
}
