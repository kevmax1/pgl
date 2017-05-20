<?php

namespace App\Repositories;

use App\Models\AnneeAcademique;
use InfyOm\Generator\Common\BaseRepository;

class AnneeAcademiqueRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'libelle',
        'date_debut',
        'date_fin',
        'encours'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AnneeAcademique::class;
    }
}
