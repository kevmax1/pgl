<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Eleve
 * @package App\Models
 * @version May 20, 2017, 1:11 am UTC
 */
class Eleve extends Model
{
    use SoftDeletes;

    public $table = 'eleves';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'matricule',
        'nom',
        'prenom',
        'sexe_id',
        'date_naissance'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'matricule' => 'string',
        'nom' => 'string',
        'prenom' => 'string',
        'sexe_id' => 'integer',
        'date_naissance' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required',
        'sexe_id' => 'required',
        'date_naissance' => 'required',
        'niveau_id' => 'required',
        'nom_parent_1' => 'required',
        'prenom_parent_1' => 'required',
        'telephone_parent_1' => 'required',
        'adresse_parent_1' => 'required',
    ];

    public function inscriptions(){
        return $this->hasMany(Inscription::class);
    }

    public function parents(){
        return $this->hasMany(Parent2::class);
    }

    public function sexe()
    {
        return $this->belongsTo(Sexe::class);
    }

}
