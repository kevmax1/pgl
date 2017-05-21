<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AnneeAcademique
 * @package App\Models
 * @version May 19, 2017, 10:32 pm UTC
 */
class AnneeAcademique extends Model
{
    use SoftDeletes;

    public $table = 'annee_academiques';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'libelle',
        'date_debut',
        'date_fin',
        'encours'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'libelle' => 'string',
        'date_debut' => 'date',
        'date_fin' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'libelle' => 'required',
        'date_debut' => 'required',
        'date_fin' => 'required',
        'encours' => 'required'
    ];

    
}
