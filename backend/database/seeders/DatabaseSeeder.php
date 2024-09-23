<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $cant = 8;
        \App\Models\User::factory($cant)->create();
        \App\Models\Bar::factory($cant)->create();
        \App\Models\Trago::factory($cant)->create();
        \App\Models\Tutorial::factory($cant)->create();
        \App\Models\Etiqueta::factory($cant)->create();

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EtiquetadoRelacionSeeder::class);
    }
}
