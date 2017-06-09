<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use DB;
/**
 * Class Matiere
 * @package App\Models
 * @version May 19, 2017, 10:26 pm UTC
 */
class Matiere extends Model
{
    use SoftDeletes;

    public $table = 'matieres';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'libelle_fr',
        'libelle_en'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'libelle_fr' => 'string',
        'libelle_en' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'libelle_fr' => 'required',
        'libelle_en' => 'required'
    ];

    public function otherProgramme($req){
        $r = 'SELECT * FROM matieres 
                WHERE matieres.deleted_at IS NULL
                AND matieres.id NOT IN ( 
                    SELECT matiere_id FROM matiere_programmers
                    WHERE matiere_programmers.deleted_at IS NULL
                    AND matiere_programmers.annee_academique_id = '.$req->idanne.' 
                    AND matiere_programmers.groupe_matiere_id = '.$req->idgroupe.' 
                    AND matiere_programmers.serie_id = '.$req->idserie.' )';
        return DB::select($r);;
    }
}
