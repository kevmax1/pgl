<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Eleve
 * @package App\Models
 * @version May 20, 2017, 1:11 am UTC
 */
class Eleve extends Model
{
    use SoftDeletes;

    public $table = 'eleves';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'matricule',
        'nom',
        'prenom',
        'sexe',
        'date_naissance'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'matricule' => 'string',
        'nom' => 'string',
        'prenom' => 'string',
        'sexe' => 'string',
        'date_naissance' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required',
        'sexe' => 'required',
        'date_naissance' => 'required'
    ];

    
}
