<?php

namespace App\Filament\Resources\Vendors\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class VendorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('national_id')
                    ->required(),
                TextInput::make('passport_photo')
                    ->required(),
                TextInput::make('kra_pin_certificate')
                    ->required(),
                TextInput::make('instagram'),
                TextInput::make('twitter'),
                TextInput::make('facebook'),
                TextInput::make('tiktok'),
                Select::make('status')
                    ->options(['pending' => 'Pending', 'approved' => 'Approved', 'rejected' => 'Rejected'])
                    ->default('pending')
                    ->required(),
            ]);
    }
}
