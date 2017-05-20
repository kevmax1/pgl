<?php

namespace App\Repositories;

use App\Models\Matiere;
use InfyOm\Generator\Common\BaseRepository;

class MatiereRepository extends BaseRepository
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
        return Matiere::class;
    }
}
