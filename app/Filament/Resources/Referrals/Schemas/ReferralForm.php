<?php

namespace App\Filament\Resources\Referrals\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ReferralForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('ambassador_id')
                    ->required()
                    ->numeric(),
                TextInput::make('recruited_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
