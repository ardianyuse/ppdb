<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'members';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['group_id', 'student_id'];

    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }
    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }
    
}
