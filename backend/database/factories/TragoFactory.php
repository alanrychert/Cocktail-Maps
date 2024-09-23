<?php

namespace Database\Factories;

use App\Models\Trago;
use App\Models\Bar;
use Illuminate\Database\Eloquent\Factories\Factory;

class TragoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trago::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //protected $fillable = ['id_trago','ingredientes','precio','archivos_adjuntos'];
        $random= rand(0,1);
        if ($random == 0){
            //trago con foto
            $imagen = file_get_contents($this->faker->image());
            return [
                'ingredientes' => $this->faker->text(),
                'nombre' => $this->faker->name(),
                'precio' =>$this->faker->numberBetween($min = 100, $max = 900),
                'archivos_adjuntos'=>  base64_encode($imagen),
                'id_bar' => Bar::all()->shuffle()->first()->id_bar,
            ];
        }
        else{
            //trago sin foto
            return [
                'ingredientes' => $this->faker->text(),
                'nombre' => $this->faker->name(),
                'precio' =>$this->faker->numberBetween($min = 100, $max = 900),
                'id_bar' => Bar::all()->shuffle()->first()->id_bar,
            ];
        }
    }
}
