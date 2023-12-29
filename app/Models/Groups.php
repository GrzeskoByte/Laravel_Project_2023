<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    use HasFactory;

     
    protected $table = 'groups';
    protected $primaryKey = 'id';
    protected $fillable = [
        'group_name',
        'class_id',
    ];

    public function class()
    {
        return $this->belongsTo(Groups::class, 'class_id');
    }
}
