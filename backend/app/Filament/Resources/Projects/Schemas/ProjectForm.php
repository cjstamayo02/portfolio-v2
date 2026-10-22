<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('title')->required()->maxLength(255),
            TextInput::make('slug')
                ->maxLength(255)
                ->unique(ignoreRecord: true)
                ->helperText('Leave blank to auto-generate from the title. This becomes the page URL: /projects/your-slug'),
            Textarea::make('summary')
                ->required()
                ->rows(2)
                ->helperText('One or two sentences shown on the project card.')
                ->columnSpanFull(),
            FileUpload::make('logo_or_screenshot')
                ->image()
                ->disk('s3')
                ->directory('projects')
                ->imageEditor(),
            TagsInput::make('tech_stack')
                ->placeholder('Type a technology and press Enter')
                ->suggestions(['Laravel', 'PHP', 'MySQL', 'PostgreSQL', 'React', 'Next.js', 'Tailwind', 'REST API', 'Docker']),
            TextInput::make('live_url')->url(),
            TextInput::make('repo_url')->url(),
            Toggle::make('featured')->helperText('Featured projects are listed first.'),
            TextInput::make('sort_order')->numeric()->default(0),
            RichEditor::make('description')
                ->required()
                ->helperText('The full case study shown on the project detail page.')
                ->columnSpanFull(),
        ]);
    }
}
