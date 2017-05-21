<?php

namespace App\Repositories;

use App\Models\Affectation;
use InfyOm\Generator\Common\BaseRepository;

class AffectationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'vacation',
        'principal',
        'annee_academique_id',
        'enseignant_id',
        'classe_id',
        'matiere_programmer_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Affectation::class;
    }
}
