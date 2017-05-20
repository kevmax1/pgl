<?php

namespace App\Repositories;

use App\Models\PlageHoraire;
use InfyOm\Generator\Common\BaseRepository;

class PlageHoraireRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ordre',
        'libelle',
        'pause',
        'nbr_heure'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PlageHoraire::class;
    }
}
