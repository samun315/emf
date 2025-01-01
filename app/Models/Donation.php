<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $table = 'donation_requests';

    protected $fillable = [
        'name', 'phone_number', 'project_program_id', 'type', 'email', 'message', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'
    ];
}
