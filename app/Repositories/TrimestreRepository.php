<?php

namespace App\Repositories;

use App\Models\Trimestre;
use InfyOm\Generator\Common\BaseRepository;

class TrimestreRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'libelle_fr',
        'libelle_en',
        'annee_academique_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Trimestre::class;
    }
}
