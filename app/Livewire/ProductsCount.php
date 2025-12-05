<?php

namespace App\Livewire;

use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProductsCount extends StatsOverviewWidget
{
    public function getColumnSpan(): int |array
    {
        return 1;
    }
    protected function getStats(): array
    {
        return [
            Stat::make('Products', Product::count())
                ->description('Total registered products')
                ->icon('heroicon-o-user-group')
                ->color('sucess')
        ];
    }
}
