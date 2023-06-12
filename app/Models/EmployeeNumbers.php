<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeNumbers extends Model
{
    use HasFactory;

    protected $table="employee_phones";

    protected $fillable=[
        'employee_id',
        'phone_number_id'
    ];
}
