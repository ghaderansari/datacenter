<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Logtype
 * @package App\Models
 * @version April 8, 2019, 12:00 pm +0430
 *
 * @property string title
 * @property string status
 * @property string desc
 */
class Logtype extends Model
{
    use SoftDeletes;

    public $table = 'logtypes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'status',
        'desc'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'status' => 'string',
        'desc' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'status' => 'required'
    ];

    
}
