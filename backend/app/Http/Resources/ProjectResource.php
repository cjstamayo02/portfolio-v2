<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'summary' => $this->summary,
            'description' => $this->description,
            'image_url' => $this->logo_or_screenshot_url,
            'tech_stack' => $this->tech_stack,
            'live_url' => $this->live_url,
            'repo_url' => $this->repo_url,
            'featured' => $this->featured,
        ];
    }
}
