<?php

namespace App\Filament\Resources\CartsResource\Pages;

use App\Filament\Resources\CartsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCarts extends EditRecord
{
    protected static string $resource = CartsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
