<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // protected $table = 'siswa';
    public $timestamps = false;

    use HasFactory;
    
    protected $fillable = [
        'name',
        'email',
    ];
}
