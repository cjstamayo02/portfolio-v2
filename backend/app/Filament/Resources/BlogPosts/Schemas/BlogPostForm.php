<?php

namespace App\Filament\Resources\BlogPosts\Schemas;

use Filament\Forms\Components\{DateTimePicker, FileUpload, RichEditor, Textarea, TextInput};
use Filament\Schemas\Schema;

class BlogPostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('title')->required()->maxLength(255),
            TextInput::make('slug')->unique(ignoreRecord: true)->helperText('Blank = auto from title.'),
            Textarea::make('excerpt')->rows(2)->helperText('Short summary for the blog card.')->columnSpanFull(),
            FileUpload::make('cover_image')->image()->disk('s3')->directory('blog')->visibility('private'),
            DateTimePicker::make('published_at')->helperText('Blank = draft (hidden). A past or current time = published.'),
            RichEditor::make('content')->required()->disableToolbarButtons(['attachFiles'])->columnSpanFull(),
        ]);
    }
}
