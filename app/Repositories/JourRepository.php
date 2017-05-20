<?php

namespace App\Repositories;

use App\Models\Jour;
use InfyOm\Generator\Common\BaseRepository;

class JourRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'libelle_fr',
        'libelle_en',
        'ordre'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Jour::class;
    }
}
