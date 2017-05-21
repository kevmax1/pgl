<?php

namespace App\Repositories;

use App\Models\Serie;
use InfyOm\Generator\Common\BaseRepository;

class SerieRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'libelle_fr',
        'libelle_en',
        'niveau_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Serie::class;
    }
}
