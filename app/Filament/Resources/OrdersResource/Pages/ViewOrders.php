<?php

namespace App\Filament\Resources\OrdersResource\Pages;

use App\Filament\Resources\OrdersResource;
use Filament\Resources\Pages\Page;
use Filament\Pages\Actions;

class ViewOrders extends Page
{
    protected static string $resource = OrdersResource::class;

    protected static string $view = 'filament.resources.orders-resource.pages.view-orders';
    
    
}
