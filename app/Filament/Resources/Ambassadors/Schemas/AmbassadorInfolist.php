<?php

namespace App\Filament\Resources\Ambassadors\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AmbassadorInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user_id')
                    ->numeric(),
                TextEntry::make('referral_code'),
                TextEntry::make('passport_photo'),
                TextEntry::make('kra_pin_certificate'),
                TextEntry::make('national_id'),
                TextEntry::make('status'),
                TextEntry::make('deleted_at')
                    ->dateTime(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
