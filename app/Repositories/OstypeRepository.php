<?php

namespace App\Repositories;

use App\Models\Ostype;
use App\Repositories\BaseRepository;

/**
 * Class OstypeRepository
 * @package App\Repositories
 * @version April 8, 2019, 11:54 am +0430
*/

class OstypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'status'
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
        return Ostype::class;
    }
}
