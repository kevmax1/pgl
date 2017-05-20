<?php

namespace App\Repositories;

use App\Models\SeanceCour;
use InfyOm\Generator\Common\BaseRepository;

class SeanceCourRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'date_seance',
        'planing_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SeanceCour::class;
    }
}
