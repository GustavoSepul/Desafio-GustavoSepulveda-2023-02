<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Artista
 *
 * @property $id
 * @property $nombre
 * @property $anio_nacimiento
 * @property $nacionalidad
 * @property $imagen
 * @property $created_at
 * @property $updated_at
 *
 * @property Cancione[] $canciones
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Artista extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'anio_nacimiento' => 'required',
		'nacionalidad' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','anio_nacimiento','nacionalidad','imagen'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function canciones()
    {
        return $this->hasMany('App\Models\Cancione', 'artista_id', 'id');
    }
    

}
