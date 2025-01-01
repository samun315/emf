<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'sliders';
    protected $primaryKey = 'id';

    protected $fillable = [
         'tagline', 'title', 'banner_img', 'description', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'
    ];
}
