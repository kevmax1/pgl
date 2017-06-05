<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Parent
 * @package App\Models
 * @version May 20, 2017, 1:14 am UTC
 */
class Parent2 extends Model
{
    use SoftDeletes;

    public $table = 'parents';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nom',
        'prenom',
        'adresse',
        'telphone',
        'eleve_id'
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
        'telphone' => 'string',
        'eleve_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required',
        'adresse' => 'required',
        'telphone' => 'required',
        'eleve_id' => 'required'
    ];

    
}
