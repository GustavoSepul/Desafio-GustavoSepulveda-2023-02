<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Albume
 *
 * @property $id
 * @property $titulo
 * @property $anio
 * @property $caratula
 * @property $created_at
 * @property $updated_at
 *
 * @property Cancione[] $canciones
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Albume extends Model
{
    
    static $rules = [
		'titulo' => 'required',
		'anio' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo','anio','caratula'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function canciones()
    {
        return $this->hasMany('App\Models\Cancione', 'album_id', 'id');
    }
    

}
