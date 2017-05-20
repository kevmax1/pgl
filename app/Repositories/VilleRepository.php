<?php

namespace App\Repositories;

use App\Models\Ville;
use InfyOm\Generator\Common\BaseRepository;

class VilleRepository extends BaseRepository
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
        return Ville::class;
    }
}
