<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bar extends Model
{
    use HasFactory;
    protected $table;
    protected $primaryKey = 'id_bar';

    /**
     * Get the drinks for the blog post.
     */
    public function tragos()
    {
        return $this->hasMany(Trago::class,'id_bar');
    }

    /**
     * Relacion muchos a muchos polimorfica
     * retorna las etiquetas que posee el bar
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
    protected $fillable = ['nombre','ubicacion','descripcion','horarios','archivos_adjuntos'];
}
