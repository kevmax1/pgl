<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MatiereProgrammer
 * @package App\Models
 * @version May 19, 2017, 11:43 pm UTC
 */
class MatiereProgrammer extends Model
{
    use SoftDeletes;

    public $table = 'matiere_programmers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'coef',
        'annee_academique_id',
        'programme_id',
        'groupe_matiere_id',
        'matiere_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'coef' => 'integer',
        'annee_academique_id' => 'integer',
        'programme_id' => 'integer',
        'groupe_matiere_id' => 'integer',
        'matiere_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'coef' => 'required',
        'annee_academique_id' => 'required',
        'programme_id' => 'required',
        'groupe_matiere_id' => 'required',
        'matiere_id' => 'required'
    ];

    
}
