<?php

declare(strict_types=1);

namespace App\Concerns\Repositories;

use Illuminate\Database\DatabaseManager;

/**
 * @property-read DatabaseManager $database
 */
trait HasDatabase
{
    public function __construct(
        protected readonly DatabaseManager $database,
    ) {}
}
