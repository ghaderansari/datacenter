<?php

namespace App\Repositories;

use App\Models\Vmtype;
use App\Repositories\BaseRepository;

/**
 * Class VmtypeRepository
 * @package App\Repositories
 * @version April 8, 2019, 12:01 pm +0430
*/

class VmtypeRepository extends BaseRepository
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
        return Vmtype::class;
    }
}
