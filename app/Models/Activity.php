<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Activity extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'links' => 'array',
    ];

    public function featured_image(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'image', 'id');
    }

    public function featured_image_portrait(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'image_portrait', 'id');
    }
}
