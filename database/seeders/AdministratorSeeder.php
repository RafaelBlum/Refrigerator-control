<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Enums\PanelTypeEnum;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Administrador',
            'email' => 'rafaelblum_digital@hotmail.com',
            'panel' => PanelTypeEnum::ADMIN,
            'password' => bcrypt('123'),
        ]);
    }
}
