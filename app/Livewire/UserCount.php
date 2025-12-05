<?php

namespace App\Livewire;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserCount extends StatsOverviewWidget
{
    public function getColumnSpan(): int | array
    {
        return 1;
    }
    protected function getStats(): array
    {
        return [
            Stat::make('Users', User::count())
                ->description('Total registered users')
                ->icon('heroicon-o-user-group')
                ->color('sucess')
        ];
    }
}
