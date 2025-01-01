<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterSetting extends Model
{
    use HasFactory;

    protected $table = 'footer_settings';

    protected $fillable = [
        'email', 'phone_number', 'facebook_link', 'youtube_link', 'twitter_link', 'instagram_link', 'linkedin_link', 'address', 'created_by', 'updated_by', 'created_at', 'updated_at'
    ];
}
