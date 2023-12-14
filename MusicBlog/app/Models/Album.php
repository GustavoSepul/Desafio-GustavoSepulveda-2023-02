<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Album
 *
 * @property $id
 * @property $titulo
 * @property $singer_id
 * @property $anio
 * @property $caratula
 * @property $created_at
 * @property $updated_at
 *
 * @property Singer $singer
 * @property Song[] $songs
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Album extends Model
{
    
    static $rules = [
		'titulo' => 'required',
		'singer_id' => 'required',
		'anio' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo','singer_id','anio','caratula'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function singer()
    {
        return $this->hasOne('App\Models\Singer', 'id', 'singer_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function songs()
    {
        return $this->hasMany('App\Models\Song', 'album_id', 'id');
    }
    

}
