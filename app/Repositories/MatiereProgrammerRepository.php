<?php

namespace App\Repositories;

use App\Models\MatiereProgrammer;
use InfyOm\Generator\Common\BaseRepository;

class MatiereProgrammerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'coef',
        'annee_academique_id',
        'programme_id',
        'groupe_matiere_id',
        'matiere_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return MatiereProgrammer::class;
    }
}
