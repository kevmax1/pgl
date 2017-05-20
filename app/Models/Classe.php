<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Classe
 * @package App\Models
 * @version May 19, 2017, 10:44 pm UTC
 */
class Classe extends Model
{
    use SoftDeletes;

    public $table = 'classes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'code',
        'libelle',
        'effectif_normal',
        'serie_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'code' => 'string',
        'libelle' => 'string',
        'effectif_normal' => 'integer',
        'serie_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'code' => 'required',
        'libelle' => 'required',
        'effectif_normal' => 'required',
        'serie_id' => 'required'
    ];

    
}
