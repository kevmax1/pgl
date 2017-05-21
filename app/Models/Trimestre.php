<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Trimestre
 * @package App\Models
 * @version May 20, 2017, 12:21 am UTC
 */
class Trimestre extends Model
{
    use SoftDeletes;

    public $table = 'trimestres';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'libelle_fr',
        'libelle_en',
        'annee_academique_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'libelle_fr' => 'string',
        'libelle_en' => 'string',
        'annee_academique_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'libelle_fr' => 'required',
        'annee_academique_id' => 'required'
    ];

    
}
