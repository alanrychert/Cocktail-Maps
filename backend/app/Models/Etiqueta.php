<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    use HasFactory;

    /**
     * Relacion muchos a muchos polimorfica inversa
     * Recupera todos los bares etiquetados con esta etiqueta
     */
    public function bares()
    {
        return $this->morphedByMany(Bar::class,'etiquetable');
    }

    /**
     * Relacion muchos a muchos polimorfica inversa
     * Recupera todos los tragos etiquetados con esta etiqueta
     */
    public function tragos()
    {
        return $this->morphedByMany(Trago::class,'etiquetable');
    }

    /**
     * Relacion muchos a muchos polimorfica inversa
     * Recupera todos los bares etiquetados con esta etiqueta
     */
    public function tutoriales()
    {
        return $this->morphedByMany(Tutorial::class,'etiquetable');
    }
 

    /**
     * The attributes are mass assignable
     * 
     * @var array
     */
    protected $fillable = ['nombre'];
}
