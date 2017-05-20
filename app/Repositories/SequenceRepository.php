<?php

namespace App\Repositories;

use App\Models\Sequence;
use InfyOm\Generator\Common\BaseRepository;

class SequenceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'libelle_fr',
        'libelle_en',
        'trimestre_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Sequence::class;
    }
}
