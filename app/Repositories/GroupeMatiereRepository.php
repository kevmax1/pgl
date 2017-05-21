<?php

namespace App\Repositories;

use App\Models\GroupeMatiere;
use InfyOm\Generator\Common\BaseRepository;

class GroupeMatiereRepository extends BaseRepository
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
        return GroupeMatiere::class;
    }
}
