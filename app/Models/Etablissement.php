<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Etablissement
 * @package App\Models
 * @version May 20, 2017, 12:39 am UTC
 */
class Etablissement extends Model
{
    use SoftDeletes;

    public $table = 'etablissements';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nom',
        'devise',
        'adresse',
        'logo',
        'ville_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nom' => 'string',
        'devise' => 'string',
        'adresse' => 'string',
        'logo' => 'string',
        'ville_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required',
        'logo' => 'required',
        'ville_id' => 'required'
    ];

    
}
