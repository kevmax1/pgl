<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Chapitre
 * @package App\Models
 * @version May 20, 2017, 12:08 am UTC
 */
class Chapitre extends Model
{
    use SoftDeletes;

    public $table = 'chapitres';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'odre',
        'libelle',
        'nbr_heure',
        'nbr_heure_realiser',
        'terminer',
        'matiere_programmer_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'odre' => 'integer',
        'libelle' => 'string',
        'nbr_heure' => 'integer',
        'nbr_heure_realiser' => 'integer',
        'terminer' => 'boolean',
        'matiere_programmer_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'odre' => 'required',
        'libelle' => 'required',
        'nbr_heure' => 'required',
        'matiere_programmer_id' => 'required'
    ];

    
}
