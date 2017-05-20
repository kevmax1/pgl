<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Evaluation
 * @package App\Models
 * @version May 20, 2017, 12:35 am UTC
 */
class Evaluation extends Model
{
    use SoftDeletes;

    public $table = 'evaluations';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'code',
        'sequence_id',
        'matiere_programmer_id',
        'classe_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'code' => 'string',
        'sequence_id' => 'integer',
        'matiere_programmer_id' => 'integer',
        'classe_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'code' => 'required',
        'sequence_id' => 'required',
        'matiere_programmer_id' => 'required',
        'classe_id' => 'reauired'
    ];

    
}
