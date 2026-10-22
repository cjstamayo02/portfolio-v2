<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'education'; // Laravel would guess "education"
    protected $fillable = ['school', 'degree', 'start_year', 'end_year', 'description', 'sort_order'];
}
