<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cycle
 * @package App\Models
 * @version May 19, 2017, 10:10 pm UTC
 */
class Cycle extends Model
{
    use SoftDeletes;

    public $table = 'cycles';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'libelle_fr',
        'libelle_en',
        'section_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'libelle_fr' => 'string',
        'libelle_en' => 'string',
        'section_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'libelle_fr' => 'required',
        'libelle_en' => 'required',
        'section_id' => 'required'
    ];

    public function section(){
        return $this->belongsTo('\App\Models\section');
    }
    
}
