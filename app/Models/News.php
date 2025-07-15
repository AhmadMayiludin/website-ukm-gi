<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'user_id',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    // Automatically generate slug when creating/updating
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($news) {
            $news->slug = Str::slug($news->title);
        });

        static::updating(function ($news) {
            $news->slug = Str::slug($news->title);
        });
    }

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Route key name for route model binding
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
