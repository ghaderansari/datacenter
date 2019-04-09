<?php

namespace App\Repositories;

use App\Models\Connectiontype;
use App\Repositories\BaseRepository;

/**
 * Class ConnectiontypeRepository
 * @package App\Repositories
 * @version April 8, 2019, 11:50 am +0430
*/

class ConnectiontypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'status',
        'standard_port'
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
        return Connectiontype::class;
    }
}
