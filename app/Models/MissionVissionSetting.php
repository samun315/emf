<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionVissionSetting extends Model
{
    use HasFactory;

    protected $table = 'mission_visions';

    protected $fillable = [
        'title', 'description', 'image', 'created_by', 'updated_by', 'created_at', 'updated_at'
    ];
}
