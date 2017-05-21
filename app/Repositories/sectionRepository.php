<?php

namespace App\Repositories;

use App\Models\section;
use InfyOm\Generator\Common\BaseRepository;

class sectionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'libelle_fr',
        'libelle_en'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return section::class;
    }
}
