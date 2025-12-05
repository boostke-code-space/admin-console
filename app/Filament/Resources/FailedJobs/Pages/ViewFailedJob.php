<?php

namespace App\Filament\Resources\FailedJobs\Pages;

use App\Filament\Resources\FailedJobs\FailedJobResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Facades\Artisan;

class ViewFailedJob extends ViewRecord
{
    protected static string $resource = FailedJobResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\ViewAction::make(),

            \Filament\Actions\Action::make('rerun')
                ->label('Rerun')
                ->icon('heroicon-o-arrow-path')
                ->requiresConfirmation()
                ->action(fn($record) => Artisan::call("queue:retry {$record->uuid}")),

            \Filament\Actions\DeleteAction::make(),
        ];
    }
}
