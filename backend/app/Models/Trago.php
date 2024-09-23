<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trago extends Model
{
    use HasFactory;
    protected $table='tragos';
    protected $primaryKey = 'id_trago';

    public function bar() {
        return $this->belongsTo(Bar::class,'id_bar');
    }

    public function tutoriales()
    {
        return $this->hasMany(Tutorial::class,'id_trago');
    }

        /**
     * Relacion muchos a muchos polimorfica
     * retorna las etiquetas que posee el trago
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
    protected $fillable = ['nombre','ingredientes','precio','archivos_adjuntos'];
}