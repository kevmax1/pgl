<?php

namespace App\Repositories;

use App\Models\Classe;
use InfyOm\Generator\Common\BaseRepository;

class ClasseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'libelle',
        'effectif_normal',
        'serie_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Classe::class;
    }
}
