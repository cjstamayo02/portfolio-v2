<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;


class ProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Hero')->schema([
                TextInput::make('name')->required(),
                TextInput::make('role_title')->helperText('Shown in the browser tab, e.g. "Laravel Developer".'),
                TextInput::make('headline')->required()->helperText('First line, e.g. "Hi, I\'m Christian."'),
                TextInput::make('headline_accent')->helperText('Second line in the accent color, e.g. "Laravel developer."'),
                Textarea::make('subheadline')->required()->rows(3)->columnSpanFull(),
                TextInput::make('location')->placeholder('Malabon, Philippines'),
                Toggle::make('available')->label('Show availability badge')->default(true),
                TextInput::make('availability_text')->default('Available for work'),
                FileUpload::make('avatar')->label('Hero photo (4:5 looks best)')
                    ->image()->disk('s3')->directory('profile')->visibility('private')->imageEditor(),
            ])->columns(2),

            Section::make('Stats strip')->schema([
                Repeater::make('stats')->schema([
                    TextInput::make('value')->required()->placeholder('3+'),
                    TextInput::make('label')->required()->placeholder('Years building production systems'),
                ])->columns(2)->addActionLabel('Add stat')->reorderable()->defaultItems(0),
            ])->collapsed(),

            Section::make('Impact cards')->schema([
                TextInput::make('impact_title')->placeholder('Impact at Megaworld'),
                Repeater::make('impact')->schema([
                    TextInput::make('tag')->required()->placeholder('OWNERSHIP'),
                    Textarea::make('text')->required()->rows(2),
                ])->addActionLabel('Add card')->reorderable()->defaultItems(0),
            ])->collapsed(),

            Section::make('What I do')->schema([
                Repeater::make('services')->schema([
                    TextInput::make('icon')->placeholder('◱')->helperText('Any symbol or emoji.'),
                    TextInput::make('title')->required(),
                    Textarea::make('description')->required()->rows(2),
                ])->addActionLabel('Add service')->reorderable()->defaultItems(0),
            ])->collapsed(),

            Section::make('About')->schema([
                FileUpload::make('about_image')->image()->disk('s3')->directory('profile')
                    ->visibility('private')->imageEditor(),
                TextInput::make('about_title')->default('A little about me'),
                RichEditor::make('about')->disableToolbarButtons(['attachFiles'])->columnSpanFull(),
            ])->columns(2)->collapsed(),

            Section::make('How I work')->schema([
                Repeater::make('how_i_work')->schema([
                    TextInput::make('icon')->placeholder('▧'),
                    TextInput::make('title')->required(),
                    Textarea::make('description')->required()->rows(2),
                ])->addActionLabel('Add item')->reorderable()->defaultItems(0),
            ])->collapsed(),

            Section::make('Who I work with')->schema([
                Repeater::make('audiences')->schema([
                    TextInput::make('title')->required()->placeholder('Hiring a developer'),
                    Textarea::make('points')->rows(5)->helperText('One bullet per line.'),
                ])->addActionLabel('Add card')->reorderable()->defaultItems(0),
            ])->collapsed(),

            Section::make('Contact & links')->schema([
                TextInput::make('email')->email()->required(),
                TextInput::make('phone'),
                TextInput::make('github_url')->url(),
                TextInput::make('linkedin_url')->url(),
                TextInput::make('resume_url')->url(),
            ])->columns(2),
        ]);
    }
}
