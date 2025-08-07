<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class PostData extends Model
{
    /** @use HasFactory<\Database\Factories\PostDataFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'platform',
        'status',
        'scheduled_at'
    ];

    protected $hidden = [
        'updated_at',
        'deleted_at'
    ];
}
