<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Chapitre
 * @package App\Models
 * @version May 20, 2017, 12:08 am UTC
 */
class Chapitre extends Model
{
    use SoftDeletes;

    public $table = 'chapitres';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'libelle',
        'matiere_programmer_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'libelle' => 'string',
        'matiere_programmer_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'libelle' => 'required',
        'matiere_programmer_id' => 'required'
    ];

    public function matiere_programmer(){
        return $this->belongsTo('App\Models\MatiereProgrammer');
    }
}
