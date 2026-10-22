<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EducationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'school' => $this->school,
            'degree' => $this->degree,
            'start_year' => $this->start_year,
            'end_year' => $this->end_year,
            'description' => $this->description,
        ];
    }
}
