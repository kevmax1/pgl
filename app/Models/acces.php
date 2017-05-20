<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class acces
 * @package App\Models
 * @version May 18, 2017, 2:16 pm UTC
 */
class acces extends Model
{
    use SoftDeletes;

    public $table = 'acces';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'role_id',
        'menu_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'role_id' => 'integer',
        'menu_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'role_id' => 'required',
        'menu_id' => 'required'
    ];

    
}
