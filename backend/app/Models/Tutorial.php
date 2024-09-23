<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    use HasFactory;
    protected $table;
    protected $primaryKey = 'id_tutorial';

    public function trago() {
        return $this->belongsTo(Trago::class,'id_trago');
    }

        /**
     * Relacion muchos a muchos polimorfica
     * retorna las etiquetas que posee el tutorial
     */
    public function etiquetas(){
        return $this->morphToMany(Etiqueta::class,'etiquetable');
    }

    public function getArchivosAdjuntosAttribute($imagen) 
    {
        if ($imagen == NULL) {
            return NULL;
        }

        $contenido = stream_get_contents($imagen);

        return $contenido;
    }
    /**
     * The attributes are mass assignable
     * 
     * @var array
     */
    protected $fillable = ['nombre','descripcion','autor','archivos_adjuntos'];
}