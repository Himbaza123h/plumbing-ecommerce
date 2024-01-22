<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\ServiceProvider;


class filamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        
        Filament::serving(function () {
            // Using Vite
            Filament::registerViteTheme('resources/css/filament.css');
        
             Filament::registerNavigationItems([
            NavigationItem::make('Orders')
                ->url('/admin/orders/lst', shouldOpenInNewTab: true)
                ->icon('heroicon-o-shopping-bag')
                ->activeIcon('heroicon-o-shopping-bag')
                ->group('Shop')
                ->sort(3),
            
        ]);
        });
    }
}
