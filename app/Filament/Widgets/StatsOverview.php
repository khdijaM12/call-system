<?php

namespace App\Filament\Widgets;

use App\Models\Call;
use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('عدد الموظفين', Employee::count()),
            Card::make('إجمالي الشكاوى', Call::count()),
            Card::make('شكاوى اليوم', Call::whereDate('created_at', today())->count()),
            Card::make('قيد المعالجة', Call::where('status', 'pending')->count()),
            Card::make('تم حلها', Call::where('status', 'completed')->count()),
        ];
    }
}
