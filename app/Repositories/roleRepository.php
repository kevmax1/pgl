<?php

namespace App\Repositories;

use App\Models\role;
use InfyOm\Generator\Common\BaseRepository;

class roleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'slug',
        'model'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return role::class;
    }
}
