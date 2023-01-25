<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'groups';

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
    protected $fillable = ['user_id', 'name'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function members()
    {
        return $this->hasMany('App\Models\Member');
    }
    
}
