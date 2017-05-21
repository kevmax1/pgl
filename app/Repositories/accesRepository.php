<?php

namespace App\Repositories;

use App\Models\acces;
use InfyOm\Generator\Common\BaseRepository;

class accesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'role_id',
        'menu_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return acces::class;
    }
}
