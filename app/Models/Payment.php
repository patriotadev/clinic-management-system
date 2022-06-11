<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $primaryKey = 'id';

    protected $fillable = [
        'patient_id',
        'total',
        'status',
        'created_by'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
