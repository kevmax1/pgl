<?php

namespace App\Repositories;

use App\Models\Cycle;
use InfyOm\Generator\Common\BaseRepository;

class CycleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'libelle_fr',
        'libelle_en',
        'section_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Cycle::class;
    }
}
