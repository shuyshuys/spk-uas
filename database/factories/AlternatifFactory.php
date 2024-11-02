<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Alternatif;
use App\Models\User;

class AlternatifFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Alternatif::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'keterangan' => $this->faker->text(),
            'user_id' => User::factory(),
        ];
    }
}
