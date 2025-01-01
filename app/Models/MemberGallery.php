<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberGallery extends Model
{
    use HasFactory;

    protected $table = 'member_galleries';

    protected $fillable = [
        'user_id', 'caption', 'image', 'type', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'
    ];
}
