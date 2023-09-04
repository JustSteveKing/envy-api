<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Device;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

final class DeviceFactory extends Factory
{
    protected $model = Device::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'type' => $this->faker->word(),
            'os' => 'darwin',
            'architecture' => 'arm2',
            'identifier' => $this->faker->uuid(),
            'user_id' => User::factory(),
            'synced_at' => $this->faker->dateTime(),
        ];
    }
}
