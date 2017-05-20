<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class menu
 * @package App\Models
 * @version May 18, 2017, 12:28 pm UTC
 */
class menu extends Model
{
    use SoftDeletes;

    public $table = 'menus';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'libelle',
        'libelle_en',
        'icon',
        'parent_id',
        'route',
        'route_name',
        'module_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'libelle' => 'string',
        'libelle_en' => 'string',
        'icon' => 'string',
        'parent_id' => 'integer',
        'route' => 'string',
        'route_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'libelle' => 'required',
        'libelle_en' => 'required',
        'parent_id' => 'required',
        'route' => 'required',
        'route_name' => 'required',
        'module_id' => 'required'
    ];

    
}
