<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    protected $table = 'folders';

    protected $fillable = [
        'name', 'folder_id', 'document_file', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'
    ];
}
