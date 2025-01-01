<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $table = 'partners';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'image', 'details', 'partner_type', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'
    ];
}
