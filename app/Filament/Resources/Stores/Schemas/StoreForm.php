<?php

namespace App\Filament\Resources\Stores\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class StoreForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('vendor_id')
                    ->required()
                    ->numeric(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('logo_url'),
                TextInput::make('facebook'),
                TextInput::make('twitter'),
                TextInput::make('instagram'),
                TextInput::make('tiktok'),
                TextInput::make('county_permit')
                    ->required(),
                TextInput::make('county')
                    ->required(),
                TextInput::make('latitude')
                    ->required()
                    ->numeric(),
                TextInput::make('longitude')
                    ->required()
                    ->numeric(),
                Toggle::make('ambassador_approved')
                    ->required(),
                Toggle::make('company_approved')
                    ->required(),
                Select::make('status')
                    ->options([
                        'active' => 'Active',
                        'suspended' => 'Suspended',
                        'closed' => 'Closed',
                        'banned' => 'Banned',
                        'pending_approval' => 'Pending approval',
                    ])
                    ->default('pending_approval')
                    ->required(),
            ]);
    }
}
