<?php

namespace App\Filament\Widgets\Dashboard;

use App\Models\User;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Customers;
use Illuminate\Support\Facades\DB;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class ProductOverview extends BaseWidget

{

    protected static ?string $heading = 'Chart';

    protected function getCards(): array
    {
        
        $users = DB::table('orders') 
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('payments', 'payments.order_id', '=', 'orders.id') 
            ->get(); 
        return [
          
            Card::make('Customers', Customers::count()),
            Card::make('Products', Products::count()),
            Card::make('Users', User::count()),
            Card::make('Orders', Orders::count()),
        ];
    }
}
