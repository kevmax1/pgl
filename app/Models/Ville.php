<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Ville
 * @package App\Models
 * @version May 20, 2017, 12:36 am UTC
 */
class Ville extends Model
{
    use SoftDeletes;

    public $table = 'villes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'libelle_fr',
        'libelle_en'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'libelle_fr' => 'string',
        'libelle_en' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'libelle_fr' => 'required'
    ];

    
}
