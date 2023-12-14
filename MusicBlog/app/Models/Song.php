<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Song
 *
 * @property $id
 * @property $titulo
 * @property $album_id
 * @property $gender_id
 * @property $anio
 * @property $caratula
 * @property $created_at
 * @property $updated_at
 *
 * @property Album $album
 * @property Gender $gender
 * @property SingersSong[] $singersSongs
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Song extends Model
{
    
    static $rules = [
		'titulo' => 'required',
		'gender_id' => 'required',
		'anio' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo','album_id','gender_id','anio','caratula'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function album()
    {
        return $this->hasOne('App\Models\Album', 'id', 'album_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function gender()
    {
        return $this->hasOne('App\Models\Gender', 'id', 'gender_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function singersSongs()
    {
        return $this->hasMany('App\Models\SingersSong', 'song_id', 'id');
    }
    

}
