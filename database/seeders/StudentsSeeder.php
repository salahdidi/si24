<?php

namespace Database\Seeders;

use App\Models\Students;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Students::create([
            'name' => 'John Doe',
            'email' => '2M9P4@example.com',
            'phone' => '1234567890',
            'birth_date' => '1990-01-01'
        ]);
    }
}
