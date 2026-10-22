<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'headline',
        'subheadline',
        'about',
        'avatar',
        'email',
        'location',
        'github_url',
        'linkedin_url',
        'resume_url',
        'stats',
        'services',
        'work_with',
    ];

    protected $casts = [
        'stats' => 'array',
        'services' => 'array',
        'work_with' => 'array',
    ];

    public function getAvatarUrlAttribute(): ?string
    {
        return $this->avatar ? Storage::disk('s3')->url($this->avatar) : null;
    }
}
