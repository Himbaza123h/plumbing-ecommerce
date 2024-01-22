<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Orders;
use App\Models\Payments;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PaymentsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PaymentsResource\RelationManagers;

class PaymentsResource extends Resource
{
    protected static ?string $model = Payments::class;
     protected static ?string $navigationGroup = 'Shop';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
                $random2 = Str::random(6);
     
        return $form
            ->schema([

                Card::make()->schema([ 
                
                 Forms\Components\TextInput::make('reference')->label("Unique identifier")->default($random2)->hidden(),
                 
                Forms\Components\Select::make('order_id')
                  ->relationship('order', 'id')->searchable()
                ->reactive()
                ->afterStateUpdated(function ($state, callable $set) {
                    $orderId = $state; 

                    $order = Orders::find($orderId); 
                  
                    if ($order) {
                        $set('amount', $order->total_amount);
                    }else{
                        $set('amount', 0);
                    }
                }) ->required(),
                Forms\Components\DateTimePicker::make('payment_date')
                    ->required(),
                Forms\Components\Textarea::make('payment_method')
                    ->required()
                    ->maxLength(65535),
                 Forms\Components\Select::make('currency')
                  ->options([
                        'rwf' => 'RWF',
                        'usd' => 'USD'
                    ]),

                    
                                  
                Forms\Components\Toggle::make('payed')
                    ->required(),
                Forms\Components\TextInput::make('amount')
                ->label('Amount'),
            ]) 
         ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('reference'), 
                Tables\Columns\TextColumn::make('order_id'),
                Tables\Columns\TextColumn::make('payment_date')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('payment_method'),
                Tables\Columns\IconColumn::make('payed')
                    ->boolean(),
                Tables\Columns\TextColumn::make('amount'),
                Tables\Columns\TextColumn::make('currency'), 
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(), 
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayments::route('/create'),
            'edit' => Pages\EditPayments::route('/{record}/edit'),
        ];
    }    
}
