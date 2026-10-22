<?php
// database/seeders/PortfolioSeeder.php

namespace Database\Seeders;

use App\Models\{BlogPost, Education, Experience, Profile, Project, Skill};
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        Profile::updateOrCreate(['email' => 'tamayochristianj2@gmail.com'], [
            'name' => 'Christian Tamayo',
            'role_title' => 'Laravel Developer',
            'headline' => "Hi, I'm Christian.",
            'headline_accent' => 'Laravel developer.',
            'subheadline' => "I build and look after the websites and internal tools behind Megaworld's property listings, and I make them easy for non-technical teams to use.",
            'location' => 'Malabon, Philippines',
            'available' => true,
            'availability_text' => 'Available for work',
            'about_title' => 'A little about me',
            'about' => "<p>I'm a Laravel developer from Malabon. I started in IT support while studying Information Technology at City of Malabon University, and today I'm the sole IT resource for my department at Megaworld, covering everything from database design to deployment.</p><p>I like tools that make work simpler for the people using them, and I use AI assistants (Claude, GitHub Copilot and Gemini) as a pair programmer to move faster and catch mistakes earlier.</p>",
            'phone' => '+63 960 535-2364',
            'impact_title' => 'Impact at Megaworld',
            'stats' => [
                ['value' => '3+', 'label' => 'Years building production systems'],
                ['value' => '4', 'label' => 'Live projects shipped'],
                ['value' => 'End to end', 'label' => 'Database design to CI/CD deployment'],
                ['value' => 'AI-augmented', 'label' => 'Claude, Copilot and Gemini in daily work'],
            ],
            'impact' => [
                ['tag' => 'OWNERSHIP', 'text' => 'Sole IT resource for the department: owns systems end to end, from database design through CI/CD deployment.'],
                ['tag' => 'SPEED', 'text' => 'Cut issue-resolution and prototyping time by integrating Claude, GitHub Copilot and Gemini into the dev lifecycle.'],
                ['tag' => 'RELIABILITY', 'text' => 'Maintained continuous uptime and faster, safer releases through automated SSH-based CI/CD pipelines.'],
                ['tag' => 'AUTOMATION', 'text' => 'Eliminated manual data entry and lead-routing delays with Google Apps Script automations.'],
            ],
            'services' => [
                ['icon' => '◱', 'title' => 'Laravel Backends', 'description' => 'The database and logic behind a website, built to stay fast with lots of data.'],
                ['icon' => '▦', 'title' => 'WordPress & CMS', 'description' => 'Sites that non-technical teams can update themselves, without waiting on a developer.'],
                ['icon' => '⚡', 'title' => 'Livewire Interfaces', 'description' => 'Pages that update instantly as you filter or search, with no reloading.'],
                ['icon' => '☁', 'title' => 'API Integration', 'description' => 'Connecting a website with other services so data flows smoothly.'],
                ['icon' => '▧', 'title' => 'CI/CD & Hosting', 'description' => 'Automated, safer updates so sites stay online while they improve.'],
                ['icon' => '⟲', 'title' => 'Workflow Automation', 'description' => 'Replacing manual copy-and-paste with automatic forms, lead routing and emails.'],
            ],
            'how_i_work' => [
                ['icon' => '▧', 'title' => 'Keep it running', 'description' => 'Sites and systems that stay online, with safer, automated releases.'],
                ['icon' => '▦', 'title' => 'Make it self-serve', 'description' => 'Tools that let non-technical teams publish and update on their own.'],
                ['icon' => '⟲', 'title' => 'Automate the repetitive', 'description' => 'Less manual data entry, faster replies to new inquiries.'],
            ],
            'audiences' => [
                ['title' => 'Hiring a developer', 'points' => "3+ years owning production systems end to end for a real estate enterprise.\nComfortable being the sole technical resource: database, backend, frontend, deployment.\nWorks fast without cutting corners, using AI tools to catch issues earlier."],
                ['title' => 'Clients with a project', 'points' => "Builds WordPress and Laravel sites non-technical teams can run on their own.\nShips end to end, from Figma design handoff through live deployment.\nOpen to project-based and freelance work alongside full-time roles."],
            ],
        ]);

        Experience::updateOrCreate(['company' => 'Megaworld Corporation'], [
            'role' => 'IT Programmer',
            'description' => '<p>Sole IT resource for the department. Laravel/MySQL, WordPress, SSH-based CI/CD and Google Apps Script automation.</p>',
            'start_date' => '2023-08-01',
            'end_date' => null,
            'sort_order' => 1,
        ]);
        Experience::updateOrCreate(['company' => 'City of Malabon University'], [
            'role' => 'IT Support Intern',
            'description' => '<p>Diagnosed and resolved hardware/software issues to minimize operational downtime for university staff.</p>',
            'start_date' => '2023-01-01',
            'end_date' => '2023-05-01',
            'sort_order' => 2,
        ]);

        $projects = [
            [
                'megaworld-horizon',
                'Megaworld Horizon',
                "Enterprise real estate CMS for Megaworld's property listings.",
                ['Architected modular WordPress templates marketing manages independently.', 'Integrated SEO and analytics tracking into campaign decisions.'],
                ['WordPress', 'PHP', 'SEO'],
                'https://megaworldhorizon.com'
            ],
            [
                'horizon-portal',
                'Horizon Portal',
                'Laravel and MySQL backend for a high-volume property database.',
                ['Relational schema design and optimized Eloquent models for faster retrieval.', 'Structured API routing for clean third-party integrations.'],
                ['Laravel', 'MySQL', 'REST'],
                'https://portal.megaworldhorizon.com'
            ],
            [
                'leasing-tenant-services',
                'Leasing & Tenant Services',
                'Livewire portal replacing a manual, delay-prone inventory process.',
                ['Real-time property filtering with zero page reloads.', 'Instant availability visibility for leasing staff.'],
                ['Livewire', 'Tailwind CSS'],
                'https://leasing.megaworldhorizon.com'
            ],
        ];
        foreach ($projects as $i => [$slug, $title, $summary, $bullets, $stack, $url]) {
            Project::updateOrCreate(['slug' => $slug], [
                'title' => $title,
                'summary' => $summary,
                'bullets' => $bullets,
                'tech_stack' => $stack,
                'live_url' => $url,
                'featured' => true,
                'sort_order' => $i + 1,
            ]);
        }

        Education::updateOrCreate(['school' => 'City of Malabon University'], ['degree' => 'BS Information Technology', 'start_year' => 2019, 'end_year' => 2023, 'sort_order' => 1]);
        Education::updateOrCreate(['school' => 'Arellano University'], ['degree' => 'High School Diploma', 'start_year' => 2017, 'end_year' => 2019, 'sort_order' => 2]);

        $skills = [
            'Languages & Database' => ['PHP', 'JavaScript', 'HTML/CSS', 'SQL', 'MySQL', 'Supabase'],
            'Frameworks & Libraries' => ['Laravel', 'Livewire', 'WordPress', 'React', 'Tailwind CSS', 'shadcn/ui'],
            'Infrastructure & CI/CD' => ['Docker', 'GitHub (SSH CI/CD)', 'Hostinger', 'Vercel', 'Cloudflare'],
            'AI Engineering' => ['Claude', 'GitHub Copilot', 'Gemini'],
        ];
        $order = 0;
        foreach ($skills as $category => $names) {
            foreach ($names as $name) {
                Skill::updateOrCreate(['name' => $name], ['category' => $category, 'sort_order' => ++$order]);
            }
        }

        $posts = [
            ['filament-admin-panels', 'Why I put Filament in front of every Laravel project now', 'How a free admin-panel package cut hours of CRUD boilerplate out of client work.', '2026-09-02'],
            ['socialite-google-only-login', 'Wiring Google-only login into Filament with Socialite', 'Skipping passwords entirely for a single-admin app, and locking it down to one email.', '2026-09-20'],
            ['laravel-api-nextjs-frontend', 'Splitting a portfolio into a Laravel API and a Next.js frontend', 'Why the backend and the public site ended up as two separate deployments.', '2026-10-07'],
        ];
        foreach ($posts as [$slug, $title, $excerpt, $date]) {
            BlogPost::updateOrCreate(['slug' => $slug], [
                'title' => $title,
                'excerpt' => $excerpt,
                'content' => '<p>Write this post from the admin panel.</p>',
                'published_at' => $date,
            ]);
        }
    }
}
