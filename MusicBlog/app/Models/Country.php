<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['code','name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function singers()
    {
        return $this->hasMany('App\Models\Singer', 'pais_id', 'id');
    }
}
