<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    use HasFactory;

    protected $table = 'volunteers';

    protected $fillable = [
        'name', 'email', 'phone_number', 'designation', 'organization_name', 'about_your_self', 'image', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'
    ];
}
