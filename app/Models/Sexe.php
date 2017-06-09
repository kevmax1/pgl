<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sexe extends Model
{

    public $fillable = [
        'libelle_fr',
        'libelle_en',
        'code' => 'string'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'libelle_fr' => 'string',
        'libelle_en' => 'string',
        'code' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'libelle_fr' => 'required',
        'libelle_en' => 'required',
        'code' => 'required'
    ];
}
