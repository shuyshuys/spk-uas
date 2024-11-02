<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\KonsistensiRasio;
use App\Models\Kriteria;

class KonsistensiRasioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = KonsistensiRasio::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'rasio_konsistensi' => $this->faker->randomFloat(0, 0, 9999999999.),
            'created_at' => $this->faker->word(),
            'updated_at' => $this->faker->word(),
            'kriteria_id' => Kriteria::factory(),
        ];
    }
}
