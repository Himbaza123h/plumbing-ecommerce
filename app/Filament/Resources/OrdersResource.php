<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Carts;
use App\Models\Orders;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\OrdersResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OrdersResource\RelationManagers;
use App\Filament\Resources\CartsResource\RelationManagers\CartsRelationManager;

class OrdersResource extends Resource
{
    protected static ?string $model = Orders::class;

    
    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
     protected static ?string $navigationGroup = 'Shop';
     
    protected static bool $shouldRegisterNavigation = false;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 Card::make()
                ->schema([ 
                Forms\Components\Select::make('user_id')->searchable()
                 ->relationship('user', 'name')->required(),  

                Forms\Components\Select::make('cart_id')
                    ->label('search cart ID')
                 ->relationship('cart', 'id')
                 ->reactive()
                 ->afterStateUpdated(function ($state, callable $set) {
                    $orderId = $state; 

                    $order = Carts::find($orderId);
                    $price =0 ;
                    $quantity=0;
                    $discount=1;
                    $discountTrue=false;

                    if ($order) { 
                    $quantity=$order->quantity;

                    foreach ($order->product as $key => $value) {
                        $price += $value->price;
                
                        if ($value->discount and $value->discount->active and ( $value->discount->end_date > now()->format('Y-m-d H:i:s'))) {
                           $discount=$value->discount->percentage;
                           $discountTrue=false;
                        }
                    }
                    if($discountTrue){
                         $price = $price *  $discount/100;
 
                    }
                   
                }

                    if ($order) {
                        $set('total_amount', $price*$quantity);
                    }else{
                        $set('total_amount', 0);
                    }
                }) ->required(),


                Forms\Components\TextInput::make('total_amount')->required() ,
                Forms\Components\DateTimePicker::make('order_date')->required() ,
            ])]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('total_amount'),
                Tables\Columns\TextColumn::make('total_amount'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(), 
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
           CartsRelationManager::class
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrders::route('/create'),
            'edit' => Pages\EditOrders::route('/{record}/edit'),
            'view'=> Pages\ViewOrders::route('/{record}/view'),
        ];
    }    
}



