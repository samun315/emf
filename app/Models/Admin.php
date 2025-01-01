<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins';

    protected $fillable = [
        'name', 'email', 'phone_number', 'role_id', 'password', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'
    ];
}
