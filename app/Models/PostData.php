<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class PostData extends Model
{
    /** @use HasFactory<\Database\Factories\PostDataFactory> */
    use HasFactory, SoftDeletes;

    protected const PLATEFORM = [
        'instagram', 
        'facebook', 
        'linkedin'
    ];

    protected const STATUS = [
        'draft', 
        'scheduled', 
        'published'
    ];

    protected $fillable = [
        'title',
        'content',
        'platform',
        'status',
        'scheduled_at'
    ];

    protected $casts = [
        'scheduled_at' => 'datetime:Y-m-d H:i:s',
        'created_at' => 'datetime:Y-m-d H:i:s'
    ];

    protected $hidden = [
        'updated_at',
        'deleted_at'
    ];
}
