<?php

namespace App\Livewire;

use Filament\Widgets\ChartWidget;

class StoresCount extends ChartWidget
{
    protected ?string $heading = 'Stores Count';

    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
