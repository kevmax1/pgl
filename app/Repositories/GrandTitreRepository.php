<?php

namespace App\Repositories;

use App\Models\GrandTitre;
use InfyOm\Generator\Common\BaseRepository;

class GrandTitreRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ordre',
        'libelle',
        'terminer',
        'chapitre_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return GrandTitre::class;
    }
}
