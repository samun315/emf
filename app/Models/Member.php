<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'member_details';

    protected $fillable = [
        'user_id', 'present_job', 'date_of_birth', 'about_your_self', 'spouse_name', 'personal_charity', 'philosopy_life', 'present_address',
        'permanent_address', 'village_address', 'children_details', 'extra_curicular_activities', 'lifetime_achievement', 'special_occasions', 'executive_status',
        'passport_photo', 'family_photo', 'doctor_photo', 'student_photo', 'family_photo_caption', 'doctor_photo_caption', 'student_photo_caption', 'member_status', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'
    ];
}
