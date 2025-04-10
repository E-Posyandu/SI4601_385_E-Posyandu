<?php

namespace Database\Factories;

use App\Models\balita;
use Illuminate\Database\Eloquent\Factories\Factory;

class BalitaFactory extends Factory
{
    protected $model = balita::class;

    public function definition()
    {
        return [
            'nama_balita' => $this->faker->name,
            'tanggal_lahir' => $this->faker->date,
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            'golongan_darah' => $this->faker->randomElement(['A', 'B', 'AB', 'O']),
            'berat_badan' => $this->faker->randomFloat(2, 2, 15),
            'tinggi_badan' => $this->faker->numberBetween(45, 100),
            'orangtua_id' => \App\Models\orangtua::factory(),
            'id_vaksin' => 1,
            'id_vitamin' => 1,
            'username' => $this->faker->userName,
            'password' => bcrypt('password')
        ];
    }
}