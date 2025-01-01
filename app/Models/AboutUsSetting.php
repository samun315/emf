<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsSetting extends Model
{
    use HasFactory;

    protected $table = 'about_us_settings';

    protected $fillable = [
        'title', 'description', 'image', 'finished_project', 'donate_money', 'finished_project_desc', 'donate_money_desc', 'created_by', 'updated_by', 'created_at', 'updated_at'
    ];
}
