<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Shippings;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ShippingsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ShippingsResource\RelationManagers;
use Illuminate\Support\Facades\Http;


class ShippingsResource extends Resource
{
    protected static ?string $model = Shippings::class;
     protected static ?string $navigationGroup = 'Product';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        try {
            $response = Http::get('https://restcountries.com/v3.1/name/rwanda');
    
            if ($response->successful()) {
                $data = $response->json();
                $capital = $data[0]['capital'][0];
            } else {
                // Handle the API request failure   
                $statusCode = $response->status();
                $errorMessage = $response->body();
                // Log or throw an exception based on your application's requirements
            }
        } catch (\Exception $e) {
            // Handle cURL or other exceptions
            // Log or throw an exception based on your application's requirements
        }
    
        return $form->schema([ 
            Card::make()->schema([
                Forms\Components\Select::make('product_id')
                    ->relationship('product', 'name')->searchable()
                    ->reactive()
                    ->required(), 
                Forms\Components\Toggle::make('shipping')
                    ->required(), 
                Forms\Components\Select::make('city')
                    ->multiple()
                    ->options([$capital => $capital])
                    ->searchable(),
            ]),
        ]);
    }
    

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product.name'), 
                 Tables\Columns\IconColumn::make('shipping')
                    ->boolean(),
                Tables\Columns\TextColumn::make('city')
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
            'index' => Pages\ListShippings::route('/'),
            'create' => Pages\CreateShippings::route('/create'),
            'edit' => Pages\EditShippings::route('/{record}/edit'),
        ];
    }    
}
