<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeProfile extends Model
{
    use HasFactory;

    protected $table = 'employee_profile';
    protected $fillable = ['first_name', 'middle_name', 'last_name', 'address', 'designation'];
    protected $guarded = [];
}
