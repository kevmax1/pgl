<?php

namespace App\Repositories;

use App\Models\Planing;
use InfyOm\Generator\Common\BaseRepository;

class PlaningRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'matiere_programmer_id',
        'jour_id',
        'plage_horaire_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Planing::class;
    }
}
