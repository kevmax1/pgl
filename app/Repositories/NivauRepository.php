<?php

namespace App\Repositories;

use App\Models\Nivau;
use InfyOm\Generator\Common\BaseRepository;

class NivauRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'libelle_fr',
        'libelle_fr',
        'cycle_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Nivau::class;
    }
}
