<?php

namespace App\Filament\Resources\ShippingsResource\Pages;

use App\Filament\Resources\ShippingsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListShippings extends ListRecords
{
    protected static string $resource = ShippingsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
