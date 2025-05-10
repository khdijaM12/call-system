<?php

namespace App\Filament\Resources\ComplaintTypesResource\Pages;

use App\Filament\Resources\ComplaintTypesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditComplaintTypes extends EditRecord
{
    protected static string $resource = ComplaintTypesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
