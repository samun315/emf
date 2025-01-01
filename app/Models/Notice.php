<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    protected $table = 'notices';

    protected $fillable = [
        'title', 'deadline', 'details', 'image', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'
    ];
}
