<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class module
 * @package App\Models
 * @version May 18, 2017, 12:07 pm UTC
 */
class module extends Model
{
    use SoftDeletes;

    public $table = 'modules';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'libelle',
        'couleur'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'libelle' => 'string',
        'couleur' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'libelle' => 'required',
        'couleur' => 'required'
    ];

    
}
