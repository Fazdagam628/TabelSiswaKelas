<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class StudentFactory extends Factory
{
    public function definition(): array
    {
        // Buat direktori jika belum ada
        if (!Storage::exists('public/foto')) {
            Storage::makeDirectory('public/foto');
        }

        return [
            'nama' => fake()->name(),
            'jenis_kelamin' => fake()->randomElement(['L', 'P']),
            'tanggal_lahir' => fake()->date(),
            'tempat_lahir' => fake()->city(),
            'nis' => fake()->unique()->numberBetween(100000, 999999),
            'alamat' => fake()->address(),
            'angkatan' => fake()->year(),
            'foto' => $this->generateAndSaveFakeImage(),
        ];
    }

    protected function generateAndSaveFakeImage()
    {
        $filename = 'foto_' . uniqid() . '.jpg';
        $filepath = 'public/foto/' . $filename;

        // Generate gambar dummy menggunakan faker (tanpa package eksternal)
        file_put_contents(
            storage_path('app/' . $filepath),
            file_get_contents('https://i.pravatar.cc/300?img=' . rand(1, 70))
        );

        return $filename;
    }
}
