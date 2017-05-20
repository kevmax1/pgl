<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class GrandTitre
 * @package App\Models
 * @version May 20, 2017, 12:11 am UTC
 */
class GrandTitre extends Model
{
    use SoftDeletes;

    public $table = 'grand_titres';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'ordre',
        'libelle',
        'terminer',
        'chapitre_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ordre' => 'integer',
        'libelle' => 'string',
        'terminer' => 'boolean',
        'chapitre_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ordre' => 'required',
        'libelle' => 'required',
        'chapitre_id' => 'required'
    ];

    
}
