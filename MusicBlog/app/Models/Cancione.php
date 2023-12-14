<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cancione
 *
 * @property $id
 * @property $titulo
 * @property $album_id
 * @property $artista_id
 * @property $genero_id
 * @property $duracion
 * @property $anio
 * @property $caratula
 * @property $created_at
 * @property $updated_at
 *
 * @property Albume $albume
 * @property Artista $artista
 * @property Genero $genero
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cancione extends Model
{
    
    static $rules = [
		'titulo' => 'required',
		'album_id' => 'required',
		'artista_id' => 'required',
		'genero_id' => 'required',
		'duracion' => 'required',
		'anio' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo','album_id','artista_id','genero_id','duracion','anio','caratula'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function albume()
    {
        return $this->hasOne('App\Models\Albume', 'id', 'album_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function artista()
    {
        return $this->hasOne('App\Models\Artista', 'id', 'artista_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function genero()
    {
        return $this->hasOne('App\Models\Genero', 'id', 'genero_id');
    }
    

}
