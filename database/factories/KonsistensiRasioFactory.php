<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\KonsistensiRasio;
use App\Models\Kriteria1;
use App\Models\Kriteria2;

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
            'kriteria1_id' => Kriteria1::factory(),
            'kriteria2_id' => Kriteria2::factory(),
        ];
    }
}
