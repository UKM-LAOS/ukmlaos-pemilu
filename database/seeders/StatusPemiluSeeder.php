<?php

namespace Database\Seeders;

use App\Models\StatusPemilu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusPemiluSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StatusPemilu::create([
            'status' => false,
        ]);
    }
}
