<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Type::create(['name' => 'Tutoriel']);
        Type::create(['name' => 'Actualité']);
        Type::create(['name' => 'Opinion']);
    }
}
