<?php

namespace Database\Seeders;
use App\Models\Trago;
use App\Models\Bar;

use Illuminate\Database\Seeder;

class TragoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ['id_trago','nombre','ingredientes','precio','archivos_adjuntos'];
        for ($i = 0; $i < 5; $i++){
            Trago::create(array(
                'ingredientes' => $this->faker->text(),
                'nombre' => $this->faker->name(),
                'precio' =>$this->faker->numberBetween($min = 100, $max = 9000),
                'archivos_adjuntos'=> $this->faker->image(),
                'id_bar' => Bar::all()->shuffle()->first()->id,
            ));
        }
    }
}
