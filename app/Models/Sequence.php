<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Sequence
 * @package App\Models
 * @version May 20, 2017, 12:29 am UTC
 */
class Sequence extends Model
{
    use SoftDeletes;

    public $table = 'sequences';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'libelle_fr',
        'libelle_en',
        'trimestre_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'libelle_fr' => 'string',
        'libelle_en' => 'string',
        'trimestre_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'libelle_fr' => 'required',
        'trimestre_id' => 'required'
    ];

    
}
