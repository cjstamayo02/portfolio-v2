<?php
// routes/api.php
use App\Http\Resources\{BlogPostResource, EducationResource, ExperienceResource, ProfileResource, ProjectResource, SkillResource};
use App\Models\{BlogPost, Education, Experience, Profile, Project, Skill};
use Illuminate\Support\Facades\Route;

Route::get('/profile', fn() => new ProfileResource(Profile::firstOrFail()));

Route::get('/experiences', fn() => ExperienceResource::collection(Experience::orderBy('sort_order')->get()));

Route::get('/projects', fn() => ProjectResource::collection(
    Project::orderByDesc('featured')->orderBy('sort_order')->get()
));
Route::get('/projects/{slug}', fn(string $slug) => new ProjectResource(Project::where('slug', $slug)->firstOrFail()));

Route::get('/education', fn() => EducationResource::collection(Education::orderBy('sort_order')->get()));

Route::get('/skills', fn() => SkillResource::collection(Skill::orderBy('sort_order')->orderBy('id')->get()));

Route::get('/blog-posts', fn() => BlogPostResource::collection(
    BlogPost::whereNotNull('published_at')->where('published_at', '<=', now())->latest('published_at')->get()
));
Route::get('/blog-posts/{slug}', fn(string $slug) => new BlogPostResource(
    BlogPost::where('slug', $slug)->whereNotNull('published_at')->where('published_at', '<=', now())->firstOrFail()
));
