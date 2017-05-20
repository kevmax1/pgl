<?php

namespace App\Repositories;

use App\Models\module;
use InfyOm\Generator\Common\BaseRepository;

class moduleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'libelle',
        'couleur'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return module::class;
    }
}
