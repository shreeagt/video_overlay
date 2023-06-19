<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoModel extends Model
{
    use HasFactory;

    protected $table = 'video';
   
    protected $primaryKey = 'video_id';
    protected $fillable = [
        'video_path',
        'video_name',
        'video_description',
        'status',        
        'created_at',
        'created_by',
        'updated_at',
        'update_by',
    ];
}
