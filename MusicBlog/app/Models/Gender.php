<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Gender
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Song[] $songs
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Gender extends Model
{
    
    static $rules = [
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function songs()
    {
        return $this->hasMany('App\Models\Song', 'gender_id', 'id');
    }
    

}
