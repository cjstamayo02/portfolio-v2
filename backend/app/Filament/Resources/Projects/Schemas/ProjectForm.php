<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
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
            TextInput::make('slug')->unique(ignoreRecord: true)->helperText('Leave blank to auto-generate.'),
            Textarea::make('summary')->required()->rows(2)->columnSpanFull(),
            Repeater::make('bullets')
                ->simple(TextInput::make('bullet')->required())
                ->addActionLabel('Add bullet')->reorderable()->columnSpanFull()
                ->helperText('Short points shown on the project card.'),
            FileUpload::make('logo_or_screenshot')->image()->disk('s3')->directory('projects')
                ->visibility('private')->imageEditor(),
            TagsInput::make('tech_stack')->placeholder('Type and press Enter'),
            TextInput::make('live_url')->url(),
            TextInput::make('repo_url')->url(),
            Toggle::make('featured'),
            TextInput::make('sort_order')->numeric()->default(0),
            RichEditor::make('description')->disableToolbarButtons(['attachFiles'])
                ->helperText('Optional full case study (the project detail page).')->columnSpanFull(),
        ]);
    }
}
