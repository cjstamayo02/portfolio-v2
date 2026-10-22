<?php

namespace App\Filament\Resources\Education\Schemas;

use Filament\Forms\Components\{Textarea, TextInput};
use Filament\Schemas\Schema;

class EducationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('school')->required(),
            TextInput::make('degree')->required(),
            TextInput::make('start_year')->numeric()->required(),
            TextInput::make('end_year')->numeric()->helperText('Blank = Present.'),
            Textarea::make('description')->rows(2)->columnSpanFull(),
            TextInput::make('sort_order')->numeric()->default(0),
        ]);
    }
}
