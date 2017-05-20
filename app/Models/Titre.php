<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Titre
 * @package App\Models
 * @version May 20, 2017, 12:16 am UTC
 */
class Titre extends Model
{
    use SoftDeletes;

    public $table = 'titres';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'ordre',
        'libelle',
        'grand_titre_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ordre' => 'integer',
        'libelle' => 'string',
        'grand_titre_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ordre' => 'required',
        'libelle' => 'required',
        'grand_titre_id' => 'required'
    ];

    
}
