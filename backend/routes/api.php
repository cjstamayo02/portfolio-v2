<?php

use App\Http\Resources\BlogPostResource;
use App\Http\Resources\ExperienceResource;
use App\Http\Resources\ProjectResource;
use App\Models\BlogPost;
use App\Models\Experience;
use App\Models\Project;
use Illuminate\Support\Facades\Route;


Route::get('/experiences', fn() => ExperienceResource::collection(
    Experience::orderBy('sort_order')->get()
));

Route::get('/projects', fn() => ProjectResource::collection(
    Project::orderBy('sort_order')->get()
));

Route::get('/blog-posts', fn() => BlogPostResource::collection(
    BlogPost::whereNotNull('published_at')->latest('published_at')->get()
));

Route::get('/blog-posts/{slug}', fn(string $slug) => new BlogPostResource(
    BlogPost::where('slug', $slug)->whereNotNull('published_at')->firstOrFail()
));
