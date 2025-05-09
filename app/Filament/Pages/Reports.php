<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;

class Reports extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static string $view = 'filament.pages.reports';

    protected static ?string $navigationGroup = 'التقارير';
    protected static ?string $title = 'التقارير العامة';

    public function getComplaintStats()
    {
        return DB::table('complaints')
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();
    }

    public function getEmployeeStats()
    {
        return DB::table('complaints')
            ->join('users', 'complaints.assigned_to', '=', 'users.id')
            ->select('users.name', DB::raw('count(*) as total'))
            ->groupBy('users.name')
            ->get();
    }

    public static function shouldRegisterNavigation(): bool
    {
        // تظهر فقط لو المستخدم أدمن
        return auth()->check() && auth()->user()->role === 'admin';
    }
}
