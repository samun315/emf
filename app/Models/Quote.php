<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $table = 'quotes';

    protected $fillable = [
        'title', 'author_name', 'author_image', 'author_address', 'details', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'
    ];
}
