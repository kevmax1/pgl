<?php

namespace App\Repositories;

use App\Models\Inscription;
use InfyOm\Generator\Common\BaseRepository;

class InscriptionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'date_inscription',
        'annee_academique_id',
        'niveau_id',
        'eleve_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Inscription::class;
    }
}
