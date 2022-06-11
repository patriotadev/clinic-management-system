<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'patients';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'gender',
        'age',
        'phone',
        'address',
        'created_by'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
