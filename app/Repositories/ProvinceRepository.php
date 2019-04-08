<?php

namespace App\Repositories;

use App\Models\Province;
use App\Repositories\BaseRepository;

/**
 * Class ProvinceRepository
 * @package App\Repositories
 * @version April 8, 2019, 6:22 am UTC
*/

class ProvinceRepository extends BaseRepository
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
        return Province::class;
    }
}
