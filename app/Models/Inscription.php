<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Inscription
 * @package App\Models
 * @version May 20, 2017, 1:22 am UTC
 */
class Inscription extends Model
{
    use SoftDeletes;

    public $table = 'inscriptions';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'date_inscription',
        'annee_academique_id',
        'niveau_id',
        'eleve_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'date_inscription' => 'date',
        'annee_academique_id' => 'integer',
        'niveau_id' => 'integer',
        'eleve_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'annee_academique_id' => 'required',
        'niveau_id' => 'required',
        'eleve_id' => 'required'
    ];

    
}
