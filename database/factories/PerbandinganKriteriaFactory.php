<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Kriteria1;
use App\Models\Kriteria2;
use App\Models\PerbandinganKriteria;

class PerbandinganKriteriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PerbandinganKriteria::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nilai_perbandingan' => $this->faker->randomFloat(0, 0, 9999999999.),
            'kriteria1_id' => Kriteria1::factory(),
            'kriteria2_id' => Kriteria2::factory(),
        ];
    }
}
