<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectFollowUp extends Model
{
    use HasFactory;

    protected $table = 'project_followup';

    protected $fillable = [
        'project_id', 'title', 'details', 'attachment', 'image_url', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'
    ];
}
