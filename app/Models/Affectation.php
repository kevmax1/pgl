<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Affectation
 * @package App\Models
 * @version May 20, 2017, 12:02 am UTC
 */
class Affectation extends Model
{
    use SoftDeletes;

    public $table = 'affectations';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'vacation',
        'principal',
        'annee_academique_id',
        'enseignant_id',
        'classe_id',
        'matiere_programmer_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'vacation' => 'boolean',
        'principal' => 'boolean',
        'annee_academique_id' => 'integer',
        'enseignant_id' => 'integer',
        'classe_id' => 'integer',
        'matiere_programmer_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'vacation' => 'requied',
        'principal' => 'required',
        'annee_academique_id' => 'required',
        'enseignant_id' => 'required',
        'classe_id' => 'required',
        'matiere_programmer_id' => 'required'
    ];

    
}
