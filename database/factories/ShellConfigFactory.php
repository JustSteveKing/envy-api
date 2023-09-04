<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Device;
use App\Models\Shell;
use App\Models\ShellConfig;
use Illuminate\Database\Eloquent\Factories\Factory;

final class ShellConfigFactory extends Factory
{
    protected $model = ShellConfig::class;

    public function definition(): array
    {
        return [
            'data' => null,
            'device_id' => Device::factory(),
            'shell_id' => Shell::factory(),
        ];
    }
}
