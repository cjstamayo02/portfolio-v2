<?php

namespace App\Filament\Resources\Skills\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;


class SkillForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')->required(),
            TextInput::make('category')->required()
                ->datalist(['Languages & Database', 'Frameworks & Libraries', 'Infrastructure & CI/CD', 'AI Engineering'])
                ->helperText('Skills with the same category appear together as one group of chips.'),
            TextInput::make('sort_order')->numeric()->default(0),
        ]);
    }
}
