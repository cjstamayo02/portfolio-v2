<?php

namespace App\Filament\Resources\Experiences\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ExperienceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('company')->required()->maxLength(255),
            TextInput::make('role')->required()->maxLength(255),
            FileUpload::make('company_logo')
                ->image()
                ->disk('s3')
                ->directory('experiences')
                ->imageEditor(),
            DatePicker::make('start_date')->required(),
            DatePicker::make('end_date')
                ->helperText('Leave blank if this is your current job. It shows as "Present".'),
            RichEditor::make('description')->required()->columnSpanFull(),
            TextInput::make('sort_order')
                ->numeric()
                ->default(0)
                ->helperText('Lower numbers show first. You can also drag rows in the list.'),
        ]);
    }
}
