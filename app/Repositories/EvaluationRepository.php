<?php

namespace App\Repositories;

use App\Models\Evaluation;
use InfyOm\Generator\Common\BaseRepository;

class EvaluationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'sequence_id',
        'matiere_programmer_id',
        'classe_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Evaluation::class;
    }
}
