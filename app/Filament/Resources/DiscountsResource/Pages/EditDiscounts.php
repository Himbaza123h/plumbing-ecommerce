<?php

namespace App\Filament\Resources\DiscountsResource\Pages;

use App\Filament\Resources\DiscountsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDiscounts extends EditRecord
{
    protected static string $resource = DiscountsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
