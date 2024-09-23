<?php

namespace Database\Factories;

use App\Models\Bar;
use Illuminate\Database\Eloquent\Factories\Factory;

class BarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bar::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        $random= rand(0,1);
        if ($random == 0){
            //trago con foto
            $imagen = file_get_contents($this->faker->image());
            return [
                'nombre' => $this->faker->name(),
                'ubicacion' => $this->faker->text(),
                'descripcion' => $this->faker->text(),
                'horarios' => $this->faker->text(),
                'archivos_adjuntos'=>  base64_encode($imagen),
            ];
        }
        else{
            return [
                'nombre' => $this->faker->name(),
                'ubicacion' => $this->faker->text(),
                'descripcion' => $this->faker->text(),
                'horarios' => $this->faker->text(),
            ];
        }
    }
}
