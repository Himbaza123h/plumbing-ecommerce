<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\OrderItems;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OrderItemsResource\Pages;
use App\Filament\Resources\OrderItemsResource\RelationManagers;

class OrderItemsResource extends Resource
{
    protected static ?string $model = OrderItems::class;

    protected static ?string $navigationIcon = 'heroicon-o-plus-circle';
    protected static ?string $navigationGroup = 'Shop';
    protected static bool $shouldRegisterNavigation = false;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([ 
                Card::make()->schema([
                Forms\Components\Select::make('order_id')
                 ->relationship('order', 'id')
                    ->required(),
                Forms\Components\Select::make('product_id')
                 ->relationship('product', 'name')
                    ->required(),   
                Forms\Components\TextInput::make('price'),
                Forms\Components\DateTimePicker::make('quantity'),
            ])]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product_id'),
                Tables\Columns\TextColumn::make('order_id'),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('quantity')
                    ->dateTime(),
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
            'index' => Pages\ListOrderItems::route('/'),
            'create' => Pages\CreateOrderItems::route('/create'),
            'edit' => Pages\EditOrderItems::route('/{record}/edit'),
        ];
    }    
}
