<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomersResource\Pages;
use App\Filament\Resources\CustomersResource\RelationManagers;
use App\Models\Customers;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomersResource extends Resource
{
    protected static ?string $model = Customers::class;
    protected static ?string $navigationGroup = 'Customer';
    protected static bool $shouldRegisterNavigation = false;


    protected static ?string $navigationIcon = 'heroicon-o-collection';
    
    public static function form(Form $form): Form
    {
            return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->required(),
                Forms\Components\TextInput::make('shipping_address')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('shipping_city')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('shipping_state')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('shipping_zip')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('shipping_country')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('shipping_method')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tracking_number')
                    ->maxLength(255),
                Forms\Components\TextInput::make('shipping_cost')
                    ->required(),
                Forms\Components\TextInput::make('shipping_status')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('estimated_delivery_date'),
                Forms\Components\TextInput::make('carrier_name')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
       return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id'),
                Tables\Columns\TextColumn::make('shipping_address'),
                Tables\Columns\TextColumn::make('shipping_city'),
                Tables\Columns\TextColumn::make('shipping_state'),
                Tables\Columns\TextColumn::make('shipping_zip'),
                Tables\Columns\TextColumn::make('shipping_country'),
                Tables\Columns\TextColumn::make('shipping_method'),
                Tables\Columns\TextColumn::make('tracking_number'),
                Tables\Columns\TextColumn::make('shipping_cost'),
                Tables\Columns\TextColumn::make('shipping_status'),
                Tables\Columns\TextColumn::make('estimated_delivery_date')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('carrier_name'),
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomers::route('/create'),
            'edit' => Pages\EditCustomers::route('/{record}/edit'),
        ];
    }    
}
