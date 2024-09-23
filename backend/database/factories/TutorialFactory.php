<?php

namespace Database\Factories;

use App\Models\Trago;
use App\Models\Tutorial;
use Illuminate\Database\Eloquent\Factories\Factory;

class TutorialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tutorial::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //protected $fillable = ['id_tutorial','descripcion','autor','archivos_adjuntos'];
        $random = rand(0,1);
        if ($random==0){
            $imagen = file_get_contents($this->faker->image());
            return [
                //
                'descripcion' => $this->faker->text(),
                'nombre' => $this->faker->name(),
                'autor' => $this->faker->name(),
                'archivos_adjuntos'=> base64_encode($imagen),
                'id_trago' => Trago::all()->shuffle()->first()->id_trago,
            ];
        }
        else{
            return [
                //
                'descripcion' => $this->faker->text(),
                'nombre' => $this->faker->name(),
                'autor' => $this->faker->name(),
                'id_trago' => Trago::all()->shuffle()->first()->id_trago,
            ];
        }
    }
}
