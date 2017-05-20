<?php

namespace App\Repositories;

use App\Models\Composition;
use InfyOm\Generator\Common\BaseRepository;

class CompositionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'note',
        'evaluation_id',
        'eleve_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Composition::class;
    }
}
