<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\MatriksKeputusan;
use App\Models\User;

class MatriksKeputusanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MatriksKeputusan::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nilai' => $this->faker->numberBetween(-10000, 10000),
            'alternatif_id' => Alternatif::factory(),
            'kriteria_id' => Kriteria::factory(),
            'user_id' => User::factory(),
        ];
    }
}
