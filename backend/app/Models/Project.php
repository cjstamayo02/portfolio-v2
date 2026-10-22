<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    protected $fillable = [
        'title',
        'summary',
        'description',
        'logo_or_screenshot',
        'tech_stack',
        'live_url',
        'repo_url',
        'featured',
        'sort_order',
    ];

    protected $casts = [
        'tech_stack' => 'array',
        'featured' => 'boolean',
    ];

    public function getLogoOrScreenshotUrlAttribute(): ?string
    {
        return $this->logo_or_screenshot ? Storage::disk('s3')->url($this->logo_or_screenshot) : null;
    }
}
