<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tardy extends Model
{
    use HasFactory;

    protected $table = 'tardy';
    protected $fillable = ['name', 'designation', 'status', 'duration'];
    protected $guarded = [];
}
