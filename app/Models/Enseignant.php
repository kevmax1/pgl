<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Enseignant
 * @package App\Models
 * @version May 19, 2017, 11:47 pm UTC
 */
class Enseignant extends Model
{
    use SoftDeletes;

    public $table = 'enseignants';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nom',
        'prenom',
        'adresse',
        'email',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nom' => 'string',
        'prenom' => 'string',
        'adresse' => 'string',
        'email' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required',
        'prenom' => 'required',
        'email' => 'required',
        'user_id' => 'required'
    ];

    
}
