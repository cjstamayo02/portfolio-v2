<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'summary',
        'bullets',
        'description',
        'logo_or_screenshot',
        'tech_stack',
        'live_url',
        'repo_url',
        'featured',
        'sort_order',
    ];

    protected $casts = ['bullets' => 'array', 'tech_stack' => 'array', 'featured' => 'boolean'];

    protected static function booted(): void
    {
        static::saving(function (Project $p) {
            if (empty($p->slug)) {
                $p->slug = Str::slug($p->title);
            }
        });
    }

    public function getLogoOrScreenshotUrlAttribute(): ?string
    {
        return $this->logo_or_screenshot ? Storage::disk('s3')->url($this->logo_or_screenshot) : null;
    }
}
