<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectGallery extends Model
{
    use HasFactory;

    protected $table = 'project_galleries';

    protected $fillable = [
        'project_id', 'caption', 'image', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'
    ];
}
