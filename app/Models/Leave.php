<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $table = 'leave';
    protected $fillable = ['name', 'designation', 'date_applied', 'date_of_leave', 'nature_of_leave'];
    protected $guarded = [];
}
