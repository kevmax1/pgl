<?php

namespace App\Repositories;

use App\Models\menu;
use InfyOm\Generator\Common\BaseRepository;

class menuRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'libelle',
        'libelle_en',
        'icon',
        'parent_id',
        'route',
        'route_name',
        'module_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return menu::class;
    }
}
