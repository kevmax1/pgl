<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Chapitre;
/**
 * Class MatiereProgrammer
 * @package App\Models
 * @version May 19, 2017, 11:43 pm UTC
 */
class MatiereProgrammer extends Model
{
    use SoftDeletes;

    public $table = 'matiere_programmers';
    public $new_ordre = '';

    protected $dates = ['deleted_at'];


    public $fillable = [
        'coef',
        'annee_academique_id',
        'serie_id',
        'groupe_matiere_id',
        'ordre_chapitres',
        'matiere_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'coef' => 'integer',
        'annee_academique_id' => 'integer',
        'serie_id' => 'integer',
        'groupe_matiere_id' => 'integer',
        'ordre_chapitres' => 'string',
        'matiere_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'coef' => 'required',
        'annee_academique_id' => 'required',
        'serie_id' => 'required',
        'groupe_matiere_id' => 'required',
        'matiere_id' => 'required'
    ];

    public function set_chap($ordres){
        foreach ($ordres as $obj) {
            $this->list .= '<li data-id="'.$obj->id.'" class="dd-item">
                        <div class="dd-handle">'.Chapitre::find($obj->id)->libelle.'</div>';
            if( isset($obj->children) ){
                $this->list .= '<ol class="dd-list">';
                $this->set_chap($obj->children);
                $this->list .= '</ol>';
            }
            $this->list .= '</li>';
        }
    }

    public function set_chap_del($ordres){
        foreach ($ordres as $obj) {
            $this->list_d .= '<li id="li-'.$obj->id.'" data-id="'.$obj->id.'" class="dd-item">
                        <div class="dd-handle">'.Chapitre::find($obj->id)->libelle.'<button href="#" class="btn btn-danger btn-xs" onclick="deleteChap('.$obj->id.')"><i class="glyphicon glyphicon-trash"></i></button></div>';
            if( isset($obj->children) ){
                $this->list_d .= '<ol class="dd-list">';
                $this->set_chap_del($obj->children);
                $this->list_d .= '</ol>';
            }
            $this->list_d .= '</li>';
        }
    }

    public function delet_chapitre($id, $ordres){
        $this->new_ordre .= '[';
        foreach ($ordres as $key => $obj) {
            if($obj->id == $id){
                Chapitre::destroy($id);
                if (isset($obj->children)) $this->delet_fils($obj->children);
                //unset($ordres[$key]);
            }else{
            $this->new_ordre .= '{"id":'.$obj->id;
                if(isset($obj->children) && count($obj->children)==1 && $obj->children[0]->id==$id){
                    Chapitre::destroy($obj->children[0]->id==$id);
                }else{
                    if (isset($obj->children) && count($obj->children)>0){
                        $this->new_ordre .= ',"children":';
                        $this->delet_chapitre($id, $obj->children);
                        $this->new_ordre .= '';
                    }
                }
            $this->new_ordre .= '},';
            }
        }
        $this->new_ordre[strlen($this->new_ordre)-1] = " ";
        $this->new_ordre .= ']';
    }

    public function delet_fils($childrens){
        foreach ($childrens as $children) {
            Chapitre::destroy($children->id);
            if (isset($children->children))
                $this->delet_fils($children->children);
        }
    }

    public function serie(){
        return $this->belongsTo('App\Models\Serie');
    }

    public function groupe_matiere(){
        return $this->belongsTo('App\Models\GroupeMatiere');
    }
    public function annee_academique(){
        return $this->belongsTo('App\Models\AnneeAcademique');
    }
    public function otherProgrammeIn($req){
        return MatiereProgrammer::where(['annee_academique_id'=>$req->idanne,'serie_id'=>$req->idserie,'groupe_matiere_id'=>$req->idgroupe])->get();
    }

    public function matiere(){
        return $this->belongsTo('App\Models\Matiere');
    }

    public function chapitre(){
        return $this->hasMany('App\Models\Chapitre');
    }
}
