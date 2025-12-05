<?php

namespace App\Livewire;

use Filament\Widgets\ChartWidget;

class Revenue extends ChartWidget
{
    protected ?string $heading = 'Revenue';

    public function getColumnSpan(): int | array
    {
        return 3;
    }
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
