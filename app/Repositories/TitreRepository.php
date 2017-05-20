<?php

namespace App\Repositories;

use App\Models\Titre;
use InfyOm\Generator\Common\BaseRepository;

class TitreRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ordre',
        'libelle',
        'grand_titre_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Titre::class;
    }
}
