<?php

namespace App\Livewire;

use App\Models\OrderItem;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProductsSold extends StatsOverviewWidget
{
    public function getColumnSpan(): int | array
    {
        return 1;
    }
    protected function getStats(): array
    {
        return [
            Stat::make('OrderItems', OrderItem::count())
                ->description('Total sold order items')
                ->icon('heroicon-o-user-group')
                ->color('sucess')
        ];
    }
}
