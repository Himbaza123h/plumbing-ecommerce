<?php

namespace App\Filament\Resources\OrderItemsResource\Pages;

use App\Filament\Resources\OrderItemsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrderItems extends ListRecords
{
    protected static string $resource = OrderItemsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
