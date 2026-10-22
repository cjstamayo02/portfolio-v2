<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'role_title' => $this->role_title,
            'headline' => $this->headline,
            'headline_accent' => $this->headline_accent,
            'subheadline' => $this->subheadline,
            'location' => $this->location,
            'available' => $this->available,
            'availability_text' => $this->availability_text,
            'avatar_url' => $this->avatar_url,
            'about_image_url' => $this->about_image_url,
            'about_title' => $this->about_title,
            'about' => $this->about,
            'impact_title' => $this->impact_title,
            'stats' => $this->stats ?? [],
            'impact' => $this->impact ?? [],
            'services' => $this->services ?? [],
            'how_i_work' => $this->how_i_work ?? [],
            'audiences' => collect($this->audiences ?? [])->map(fn($a) => [
                'title' => $a['title'] ?? '',
                'points' => preg_split('/\r\n|\r|\n/', trim($a['points'] ?? ''), -1, PREG_SPLIT_NO_EMPTY),
            ])->values(),
            'email' => $this->email,
            'phone' => $this->phone,
            'github_url' => $this->github_url,
            'linkedin_url' => $this->linkedin_url,
            'resume_url' => $this->resume_url,
        ];
    }
}
