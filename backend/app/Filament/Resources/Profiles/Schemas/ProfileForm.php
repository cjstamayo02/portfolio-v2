<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Hero')->schema([
                TextInput::make('name')->required(),
                TextInput::make('headline')->required()
                    ->helperText('The big line at the top of your site.'),
                Textarea::make('subheadline')->required()->rows(3)
                    ->helperText('The short paragraph under the headline.'),
                FileUpload::make('avatar')->image()->disk('s3')->directory('profile')->imageEditor(),
            ])->columns(2),

            Section::make('Stats')->schema([
                Repeater::make('stats')
                    ->schema([
                        TextInput::make('value')->required()->placeholder('5+'),
                        TextInput::make('label')->required()->placeholder('Years experience'),
                    ])
                    ->columns(2)
                    ->defaultItems(0)
                    ->addActionLabel('Add stat')
                    ->reorderable(),
            ]),

            Section::make('What I do')->schema([
                Repeater::make('services')
                    ->schema([
                        TextInput::make('title')->required(),
                        Textarea::make('description')->rows(2)->required(),
                    ])
                    ->defaultItems(0)
                    ->addActionLabel('Add service')
                    ->reorderable(),
            ]),

            Section::make('Who I work with')->schema([
                TagsInput::make('work_with')
                    ->placeholder('Type a name or industry and press Enter'),
            ]),

            Section::make('About')->schema([
                RichEditor::make('about')->columnSpanFull(),
            ])->collapsed(),

            Section::make('Contact & links')->schema([
                TextInput::make('email')->email()->required(),
                TextInput::make('location'),
                TextInput::make('github_url')->url(),
                TextInput::make('linkedin_url')->url(),
                TextInput::make('resume_url')->url()
                    ->helperText('Link to your CV (e.g. a public Google Drive or Supabase file URL).'),
            ])->columns(2),
        ]);
    }
}
