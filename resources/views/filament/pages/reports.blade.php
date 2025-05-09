<x-filament::page>
    <h2 class="text-xl font-bold mb-4">إحصائيات الشكاوى حسب الحالة</h2>
    <ul class="mb-6">
        @foreach ($this->getComplaintStats() as $stat)
            <li>{{ $stat->status }}: {{ $stat->total }}</li>
        @endforeach
    </ul>

    <h2 class="text-xl font-bold mb-4">عدد الشكاوى حسب الموظف</h2>
    <ul>
        @foreach ($this->getEmployeeStats() as $stat)
            <li>{{ $stat->name }}: {{ $stat->total }}</li>
        @endforeach
    </ul>
</x-filament::page>
