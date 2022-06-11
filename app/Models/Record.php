<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $table = 'records';
    protected $primaryKey = 'id';


    protected $fillable = [
        'patient_id',
        'diagnosis',
        'description',
        'medicines_name',
        'created_by'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
