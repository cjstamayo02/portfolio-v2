<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'role_title',
        'headline',
        'headline_accent',
        'subheadline',
        'location',
        'available',
        'availability_text',
        'avatar',
        'about_image',
        'about_title',
        'about',
        'impact_title',
        'stats',
        'impact',
        'services',
        'how_i_work',
        'audiences',
        'email',
        'phone',
        'github_url',
        'linkedin_url',
        'resume_url',
    ];

    protected $casts = [
        'available' => 'boolean',
        'stats' => 'array',
        'impact' => 'array',
        'services' => 'array',
        'how_i_work' => 'array',
        'audiences' => 'array',
    ];

    public function getAvatarUrlAttribute(): ?string
    {
        return $this->avatar ? Storage::disk('s3')->url($this->avatar) : null;
    }

    public function getAboutImageUrlAttribute(): ?string
    {
        return $this->about_image ? Storage::disk('s3')->url($this->about_image) : null;
    }
}
