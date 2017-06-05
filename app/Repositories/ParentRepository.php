<?php

namespace App\Repositories;

use App\Models\Parent2;
use InfyOm\Generator\Common\BaseRepository;

class ParentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'prenom',
        'adresse',
        'telphone',
        'eleve_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Parent2::class;
    }
}
