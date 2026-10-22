<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role_title')->nullable();           // browser tab title
            $table->string('headline');                         // "Hi, I'm Christian."
            $table->string('headline_accent')->nullable();      // "Laravel developer."
            $table->text('subheadline');
            $table->string('location')->nullable();
            $table->boolean('available')->default(true);
            $table->string('availability_text')->default('Available for work');
            $table->string('avatar')->nullable();               // hero photo
            $table->string('about_image')->nullable();
            $table->string('about_title')->default('A little about me');
            $table->longText('about')->nullable();
            $table->string('impact_title')->nullable();         // "Impact at Megaworld"
            $table->json('stats')->nullable();                  // [{value,label}]
            $table->json('impact')->nullable();                 // [{tag,text}]
            $table->json('services')->nullable();               // [{icon,title,description}]
            $table->json('how_i_work')->nullable();             // [{icon,title,description}]
            $table->json('audiences')->nullable();              // [{title,points}]
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('github_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('resume_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
