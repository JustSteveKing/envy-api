<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Editor;
use Illuminate\Database\Eloquent\Factories\Factory;

final class EditorFactory extends Factory
{
    protected $model = Editor::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
        ];
    }
}
