<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Carts;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CartsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CartsResource\RelationManagers;
use App\Filament\Resources\ProductsResource\RelationManagers\ProductRelationManager;

class CartsResource extends Resource
{
    protected static ?string $model = Carts::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
     protected static ?string $navigationGroup = 'Shop';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([ 
                Card::make()
                ->schema([
                Forms\Components\Select::make('product_id')
                 ->relationship('product', 'name') 
                        ->multiple() 
                    ->preload()
                ->required(),  
                Forms\Components\Select::make('user_id')
                 ->relationship('user', 'name')
                    ->required(),
                Forms\Components\TextInput::make('quantity'),
            ])]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product.name'),
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('quantity'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
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
           ProductRelationManager::class
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCarts::route('/'),
            'create' => Pages\CreateCarts::route('/create'),
            'edit' => Pages\EditCarts::route('/{record}/edit'),
        ];
    }    
}
