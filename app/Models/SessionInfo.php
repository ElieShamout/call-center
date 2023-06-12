<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionInfo extends Model
{
    use HasFactory;

    protected $table = 'session_info';

    protected $fillable = [
        'employee_id',
        'client_id',
        'appointment_id',
        'note',
        'appointment_date',
    ];

}
