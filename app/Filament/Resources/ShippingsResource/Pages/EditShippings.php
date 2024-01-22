<?php

namespace App\Filament\Resources\ShippingsResource\Pages;

use App\Filament\Resources\ShippingsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditShippings extends EditRecord
{
    protected static string $resource = ShippingsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
