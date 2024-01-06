<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $table = 'classes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'class_name',
    ];

    public function groups()
    {
        return $this->hasMany(Groups::class, 'class_id');
    }

    public function teachers()
    {
        return $this->belongsTo(Teachers::class,'class_id');
    }
}
