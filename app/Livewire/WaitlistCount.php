<?php

namespace App\Livewire;

use App\Models\WaitList;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class WaitlistCount extends StatsOverviewWidget
{
    public function getColumnSpan(): int | array
    {
        return 1;
    }
    protected function getStats(): array
    {
        return [
            Stat::make('Waitlist', WaitList::count())
                ->description('Total registered waitlist')
                ->icon('heroicon-o-user-group')
                ->color('sucess')
        ];
    }
}
