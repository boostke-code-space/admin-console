<?php

namespace App\Livewire;

use App\Models\Vendor;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class VendorsCount extends StatsOverviewWidget
{
    public function getColumnSpan(): int | array
    {
        return 1;
    }
    protected function getStats(): array
    {
        return [
            Stat::make('Vendors', Vendor::count())
                ->description('Total registered vendors')
                ->icon('heroicon-o-user-group')
                ->color('sucess')
        ];
    }
}
