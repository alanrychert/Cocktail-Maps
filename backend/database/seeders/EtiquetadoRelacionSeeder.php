<?php

namespace Database\Seeders;
use App\Models\Trago;
use App\Models\Bar;
use App\Models\Etiqueta;
use App\Models\Tutorial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtiquetadoRelacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //este for relaciona etiquetas a diferentes modelos
        for ($i=0; $i<10; $i++){
            $etiqueta = Etiqueta::all()->random()->id;
            $etiquetable = [
                Bar::class,
                Trago::class,
                Tutorial::class,
            ];
            
            $etiquetableId = null;
            $etiquetableType = array_rand($etiquetable);
            if ($etiquetable[$etiquetableType] === Bar::class) {
                $etiquetableId = Bar::all()->random()->id_bar;
            } else 
                if($etiquetable[$etiquetableType] === Trago::class) {
                    $etiquetableId = Trago::all()->random()->id_trago;
                }
                else{
                    $etiquetableId = Tutorial::all()->random()->id_tutorial;
                }

            DB::table('etiquetables')->insert(
                [
                    'etiqueta_id' => $etiqueta,
                    'etiquetable_id' => $etiquetableId,
                    'etiquetable_type' => $etiquetable[$etiquetableType]
                ]
            );
        }
    }
}
