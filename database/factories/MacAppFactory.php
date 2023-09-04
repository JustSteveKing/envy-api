<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\MacApp;
use Illuminate\Database\Eloquent\Factories\Factory;

final class MacAppFactory extends Factory
{
    protected $model = MacApp::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
        ];
    }
}
