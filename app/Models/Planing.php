<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Planing
 * @package App\Models
 * @version May 20, 2017, 1:00 am UTC
 */
class Planing extends Model
{
    use SoftDeletes;

    public $table = 'planings';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'matiere_programmer_id',
        'jour_id',
        'plage_horaire_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'matiere_programmer_id' => 'integer',
        'jour_id' => 'integer',
        'plage_horaire_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'matiere_programmer_id' => 'required',
        'jour_id' => 'required',
        'plage_horaire_id' => 'required'
    ];

    
}
