<?php

namespace App\Repositories;

use App\Models\Enseignant;
use InfyOm\Generator\Common\BaseRepository;

class EnseignantRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'prenom',
        'adresse',
        'email',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Enseignant::class;
    }
}
