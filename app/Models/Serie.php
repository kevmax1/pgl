<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Serie
 * @package App\Models
 * @version May 19, 2017, 10:18 pm UTC
 */
class Serie extends Model
{
    use SoftDeletes;

    public $table = 'series';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'code',
        'libelle_fr',
        'libelle_en',
        'niveau_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'code' => 'string',
        'libelle_fr' => 'string',
        'libelle_en' => 'string',
        'niveau_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'code' => 'required',
        'libelle_fr' => 'required',
        'libelle_en' => 'required',
        'niveau_id' => 'required'
    ];

    public function niveau(){
        return $this->belongsTo('\App\Models\Nivau');
    }
    
}
