<?php

namespace App\Filament\Resources\Skills\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SkillForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')->required(),
            TextInput::make('category')
                ->required()
                ->datalist(['Languages', 'Frameworks', 'Databases', 'DevOps', 'AI Engineering', 'Tools'])
                ->helperText('Skills with the same category are grouped together on the site.'),
        ]);
    }
}
