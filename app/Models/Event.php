<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'project_id', 'title', 'event_status', 'location', 'details', 'date', 'banner_img', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'
    ];
}
