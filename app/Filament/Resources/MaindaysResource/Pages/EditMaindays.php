<?php

namespace App\Filament\Resources\MaindaysResource\Pages;

use App\Filament\Resources\MaindaysResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMaindays extends EditRecord
{
    protected static string $resource = MaindaysResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
