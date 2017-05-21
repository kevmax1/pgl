<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Presence
 * @package App\Models
 * @version May 20, 2017, 1:30 am UTC
 */
class Presence extends Model
{
    use SoftDeletes;

    public $table = 'presences';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'justifier',
        'present',
        'eleve_id',
        'seance_cour_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'justifier' => 'boolean',
        'present' => 'boolean',
        'eleve_id' => 'integer',
        'seance_cour_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'eleve_id' => 'required',
        'seance_cour_id' => 'required'
    ];

    
}
