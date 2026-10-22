<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Experience extends Model
{
    protected $fillable = ['company', 'role', 'company_logo', 'description', 'start_date', 'end_date', 'sort_order'];
    protected $casts = ['start_date' => 'date', 'end_date' => 'date'];

    public function getCompanyLogoUrlAttribute(): ?string
    {
        return $this->company_logo ? Storage::disk('s3')->url($this->company_logo) : null;
    }
}
