<?php

namespace App\Filament\Resources\MaindaysResource\Pages;

use App\Filament\Resources\MaindaysResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMaindays extends ListRecords
{
    protected static string $resource = MaindaysResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
