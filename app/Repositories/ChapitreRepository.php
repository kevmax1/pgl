<?php

namespace App\Repositories;

use App\Models\Chapitre;
use InfyOm\Generator\Common\BaseRepository;

class ChapitreRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'odre',
        'libelle',
        'nbr_heure',
        'nbr_heure_realiser',
        'terminer',
        'matiere_programmer_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Chapitre::class;
    }
}
