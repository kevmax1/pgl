<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SeanceCour
 * @package App\Models
 * @version May 20, 2017, 1:28 am UTC
 */
class SeanceCour extends Model
{
    use SoftDeletes;

    public $table = 'seance_cours';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'date_seance',
        'planing_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'date_seance' => 'date',
        'planing_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'date_seance' => 'required',
        'planing_id' => 'required'
    ];

    
}
