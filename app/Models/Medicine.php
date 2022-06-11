<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $table = 'medicines';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'price',
        'created_by'
    ];

    protected $dates = ['created_at', 'updated_at'];
}
