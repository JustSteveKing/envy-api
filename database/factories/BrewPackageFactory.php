<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\BrewPackage;
use Illuminate\Database\Eloquent\Factories\Factory;

final class BrewPackageFactory extends Factory
{
    protected $model = BrewPackage::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'meta' => []
        ];
    }
}
