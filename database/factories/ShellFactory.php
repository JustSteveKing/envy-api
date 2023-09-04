<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Shell;
use Illuminate\Database\Eloquent\Factories\Factory;

final class ShellFactory extends Factory
{
    protected $model = Shell::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
        ];
    }
}
