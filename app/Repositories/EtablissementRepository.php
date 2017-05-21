<?php

namespace App\Repositories;

use App\Models\Etablissement;
use InfyOm\Generator\Common\BaseRepository;

class EtablissementRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'devise',
        'adresse',
        'logo',
        'ville_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Etablissement::class;
    }
}
