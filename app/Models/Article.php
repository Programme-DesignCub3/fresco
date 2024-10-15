<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\URL;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Article extends Model
{
    use HasFactory, HasSlug;

    protected $guarded = ['id'];

    protected $casts = [
        'content' => 'array',
    ];

    public function featured_image(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'image', 'id');
    }

    public function featured_image_square(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'image_square', 'id');
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
