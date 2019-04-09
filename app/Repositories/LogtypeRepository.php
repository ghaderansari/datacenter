<?php

namespace App\Repositories;

use App\Models\Logtype;
use App\Repositories\BaseRepository;

/**
 * Class LogtypeRepository
 * @package App\Repositories
 * @version April 8, 2019, 12:00 pm +0430
*/

class LogtypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'status',
        'desc'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Logtype::class;
    }
}
