<?php

namespace App\Repositories;

use App\Models\Presence;
use InfyOm\Generator\Common\BaseRepository;

class PresenceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'justifier',
        'present',
        'eleve_id',
        'seance_cour_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Presence::class;
    }
}
