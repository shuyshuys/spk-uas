<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Kriteria;
use App\Models\User;

class KriteriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kriteria::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'bobot' => $this->faker->randomFloat(2, 0, 999.99),
            'jenis_kriteria' => $this->faker->randomElement(["benefit","cost"]),
            'keterangan' => $this->faker->text(),
            'created_at' => $this->faker->word(),
            'updated_at' => $this->faker->word(),
            'user_id' => User::factory(),
        ];
    }
}
