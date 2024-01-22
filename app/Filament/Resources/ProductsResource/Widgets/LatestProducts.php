<?php

namespace App\Filament\Resources\ProductsResource\Widgets;

use Closure;
use Filament\Tables;
use App\Models\Products;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestProducts extends BaseWidget
{
    protected function getTableQuery(): Builder
    {
       return Products::query()->latest();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('id'),
            Tables\Columns\TextColumn::make('name')
                ->label('product'),
        ];
    }
}
