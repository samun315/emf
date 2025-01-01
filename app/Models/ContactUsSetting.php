<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsSetting extends Model
{
    use HasFactory;

    protected $table = 'contact_us_settings';

    protected $fillable = [
        'office_address', 'support_phone', 'event_phone', 'support_email', 'event_email', 'created_by', 'updated_by', 'created_at', 'updated_at'
    ];
}
