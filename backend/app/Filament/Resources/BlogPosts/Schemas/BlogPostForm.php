<?php

namespace App\Filament\Resources\BlogPosts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BlogPostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('title')->required()->maxLength(255),
            TextInput::make('slug')
                ->unique(ignoreRecord: true)
                ->helperText('Leave blank to auto-generate from the title.'),
            FileUpload::make('cover_image')
                ->image()->disk('s3')->directory('blog')->imageEditor(),
            DateTimePicker::make('published_at')
                ->helperText('Leave blank to save as a draft. Set a date/time to publish.'),
            RichEditor::make('content')->required()->columnSpanFull(),
        ]);
    }
}
