<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PlageHoraire
 * @package App\Models
 * @version May 20, 2017, 12:54 am UTC
 */
class PlageHoraire extends Model
{
    use SoftDeletes;

    public $table = 'plage_horaires';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'ordre',
        'libelle',
        'pause',
        'nbr_heure'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ordre' => 'integer',
        'libelle' => 'string',
        'pause' => 'boolean',
        'nbr_heure' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ordre' => 'required',
        'libelle' => 'required',
        'nbr_heure' => 'required'
    ];

    
}
