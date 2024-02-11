<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageGen extends Model
{
    use HasFactory;

    protected $table = 'image_generation';
    protected $primaryKey = 'id_image';

    protected $fillable = ['id_user', 'type', 'url', 'prompt', 'negative_prompt', 'width', 'height', 'is_safe', 'is_post'];
}
