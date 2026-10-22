<?php

namespace App\Filament\Resources\Experiences\Schemas;

use Filament\Forms\Components\{DatePicker, FileUpload, RichEditor, TextInput};
use Filament\Schemas\Schema;

class ExperienceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('company')->required(),
            TextInput::make('role')->required(),
            FileUpload::make('company_logo')->image()->disk('s3')->directory('experiences')->visibility('private'),
            DatePicker::make('start_date')->required(),
            DatePicker::make('end_date')->helperText('Leave blank for your current job ("Present").'),
            RichEditor::make('description')->required()->disableToolbarButtons(['attachFiles'])->columnSpanFull(),
            TextInput::make('sort_order')->numeric()->default(0),
        ]);
    }
}
