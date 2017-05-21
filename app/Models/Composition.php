<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Composition
 * @package App\Models
 * @version May 20, 2017, 1:17 am UTC
 */
class Composition extends Model
{
    use SoftDeletes;

    public $table = 'compositions';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'note',
        'evaluation_id',
        'eleve_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'note' => 'double',
        'evaluation_id' => 'integer',
        'eleve_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'note' => 'required',
        'evaluation_id' => 'required',
        'eleve_id' => 'required'
    ];

    
}
