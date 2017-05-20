<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class GroupeMatiere
 * @package App\Models
 * @version May 19, 2017, 10:28 pm UTC
 */
class GroupeMatiere extends Model
{
    use SoftDeletes;

    public $table = 'groupe_matieres';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'libelle_fr',
        'libelle_en'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'libelle_fr' => 'string',
        'libelle_en' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'libelle_fr' => 'required',
        'libelle_en' => 'required'
    ];

    
}
