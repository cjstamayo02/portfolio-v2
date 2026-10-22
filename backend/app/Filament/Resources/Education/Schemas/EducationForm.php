<?php

namespace App\Filament\Resources\Education\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EducationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('school')->required(),
            TextInput::make('degree')->required(),
            TextInput::make('start_year')->numeric()->required()->minValue(1950)->maxValue(2100),
            TextInput::make('end_year')->numeric()->helperText('Leave blank if ongoing.'),
            Textarea::make('description')->rows(3)->columnSpanFull(),
            TextInput::make('sort_order')->numeric()->default(0),
        ]);
    }
}
