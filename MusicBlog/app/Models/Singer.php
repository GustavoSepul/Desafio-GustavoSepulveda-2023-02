<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Singer
 *
 * @property $id
 * @property $nombre
 * @property $anio_nacimiento
 * @property $nacionalidad
 * @property $imagen
 * @property $created_at
 * @property $updated_at
 *
 * @property Album[] $albums
 * @property SingersSong $singersSong
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Singer extends Model
{
    use HasFactory;
    
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
    public function albums()
    {
        return $this->hasMany('App\Models\Album', 'singer_id', 'id');
    }
    

    public function songs()
    {
        return $this->belongsToMany(Song::class, 'singers_songs');
    }
    

}
