<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Province
 * @package App\Models
 * @version April 8, 2019, 6:22 am UTC
 *
 * @property \App\Models\User user
 * @property string title
 * @property string status
 * @property string desc
 * @property integer user_id
 */
class Province extends Model
{
    use SoftDeletes;

    public $table = 'provinces';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'status',
        'desc',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'status' => 'string',
        'desc' => 'string',
        'user_id' => 'integer'
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
}
