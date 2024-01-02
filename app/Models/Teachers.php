<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    use HasFactory;
    
    protected $table = 'teachers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
    ];
}