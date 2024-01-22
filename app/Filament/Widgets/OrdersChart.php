<?php

namespace App\Filament\Widgets;

use App\Models\Orders;
use Illuminate\Support\Carbon;
use Filament\Widgets\BarChartWidget;

class OrdersChart extends BarChartWidget
{
    protected static ?string $heading = 'Chart';
    
    protected function getData(): array
    {
     
            $orders=Orders::select('created_at','total_amount')->where('status','paid')->get()->groupBy(function($orders){
                return Carbon::parse($orders->created_at)->format('F Y');
            });
            $amount = [];
            foreach ($orders as $order => $value) {
               array_push($amount, $value->pluck('total_amount')->sum());
            }
      
                return [
                    'datasets' => [
                        [
                            'label' => 'Orders paid',
                            'data' => $amount,
                            'backgroundColor' => '#36A2EB',
                            'borderColor' => '#9BD0F5',
                        ],
                    ],
                    'labels' =>  $orders->keys(),
                ];
    }
}
