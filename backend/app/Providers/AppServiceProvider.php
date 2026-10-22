<?php

namespace App\Providers;

use App\Models\{BlogPost, Education, Experience, Profile, Project, Skill};
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        $notify = function () {
            $url = config('services.frontend.url');
            if (! $url) return;

            try {
                Http::withToken(config('services.frontend.revalidate_secret'))
                    ->timeout(5)
                    ->post(rtrim($url, '/') . '/api/revalidate');
            } catch (\Throwable $e) {
                report($e); // never block saving in the admin if the frontend is unreachable
            }
        };

        foreach ([Profile::class, Experience::class, Project::class, Education::class, BlogPost::class, Skill::class] as $model) {
            $model::saved($notify);
            $model::deleted($notify);
        }
    }
}
