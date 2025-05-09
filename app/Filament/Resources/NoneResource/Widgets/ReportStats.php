<?php

namespace App\Filament\Widgets;

use App\Models\Call;
use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class ReportStats extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('عدد الموظفين', Employee::count()),

            Card::make('إجمالي الشكاوي', Call::count()),

            Card::make('شكاوي مفتوحة', Call::where('status', 'open')->count()),

            Card::make('شكاوي مغلقة', Call::where('status', 'closed')->count()),

            Card::make('شكاوي اليوم', Call::whereDate('created_at', today())->count()),

            Card::make('شكاوي هذا الشهر', Call::whereMonth('created_at', now()->month)->count()),
        ];
    }
}
