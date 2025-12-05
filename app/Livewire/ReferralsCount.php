<?php

namespace App\Livewire;

use Filament\Widgets\ChartWidget;

class ReferralsCount extends ChartWidget
{
    protected ?string $heading = 'Referrals Count';

    public function getColumns(): int | array
    {
        return 4;
    }
    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
