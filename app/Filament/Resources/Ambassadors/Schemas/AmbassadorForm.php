<?php

namespace App\Filament\Resources\Ambassadors\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AmbassadorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('referral_code')
                    ->required(),
                TextInput::make('passport_photo'),
                TextInput::make('kra_pin_certificate'),
                TextInput::make('national_id'),
                Select::make('status')
                    ->options([
            'pending' => 'Pending',
            'approved' => 'Approved',
            'rejected' => 'Rejected',
            'banned' => 'Banned',
        ])
                    ->default('pending')
                    ->required(),
            ]);
    }
}
