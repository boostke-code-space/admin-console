<?php

namespace App\Filament\Resources\Ambassadors\Pages;

use App\Filament\Resources\Ambassadors\AmbassadorResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAmbassador extends ViewRecord
{
    protected static string $resource = AmbassadorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
