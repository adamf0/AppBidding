<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Profile::class;

    public function definition()
    {
        return [
            'nama_lengkap' => $this->faker->unique()->name(),
            'jenis_kelamin' => $this->faker->boolean(),
            'tanggal_lahir' => $this->faker->date($format='Y-m-d', $max='now'),
            'saldo' => $this->faker->randomDigit()
        ];
    }
}
