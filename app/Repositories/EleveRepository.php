<?php

namespace App\Repositories;

use App\Models\Eleve;
use InfyOm\Generator\Common\BaseRepository;

class EleveRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'matricule',
        'nom',
        'prenom',
        'sexe_id',
        'date_naissance'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Eleve::class;
    }
}
