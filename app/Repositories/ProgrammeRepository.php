<?php

namespace App\Repositories;

use App\Models\Programme;
use InfyOm\Generator\Common\BaseRepository;

class ProgrammeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'libelle_fr',
        'libelle_en',
        'serie_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Programme::class;
    }
}
