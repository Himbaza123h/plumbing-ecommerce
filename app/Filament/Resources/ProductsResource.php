<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Products;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProductsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProductsResource\RelationManagers;
use App\Filament\Resources\CategoryResource\RelationManagers\CategoriesRelationManager;

class ProductsResource extends Resource
{
    protected static ?string $model = Products::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';   
    
     protected static ?string $navigationGroup = 'Product';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([ 
                Forms\Components\Select::make('category_id')
    ->relationship('category', 'name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255) 
                     ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $set('slug', Str::slug($state));
                    }),
                Forms\Components\TextInput::make('slug'),
                Forms\Components\TextInput::make('price'),
                Forms\Components\Select::make('currency')
                        ->options([
                            'RWF' => 'RWF',
                            'USD' => 'USD', 
                        ]),
                Forms\Components\TextInput::make('quantity_available'),
                Forms\Components\FileUpload::make('cover')->image()
                        ->imageResizeMode('cover')
                        ->imageCropAspectRatio('16:9')
                        ->imageResizeTargetWidth('1920')
                        ->imageResizeTargetHeight('1080'),
                    
                Forms\Components\FileUpload::make('images')->image()->enableOpen()->multiple(),
                
                Forms\Components\RichEditor::make('description')    
                                            ->fileAttachmentsDisk('s3')
                                            ->fileAttachmentsDirectory('attachments')
                                            ->fileAttachmentsVisibility('private')->maxLength(65535), 
                Forms\Components\KeyValue::make('details')
                                            ->keyLabel('Property name')
                                            ->valueLabel('Property value') 
                                            ->keyPlaceholder('Property name')
                                            ->valuePlaceholder('Property value')
                                            ->label('Add more details')
            ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category.name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('description')->html()->limit(50),
                Tables\Columns\TextColumn::make('price')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('currency')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('quantity_available')->sortable()->searchable(),
                // Tables\Columns\TextColumn::make('images'), 
                Tables\Columns\TextColumn::make('details'),
                Tables\Columns\TextColumn::make('created_at')->sortable()->searchable()
                    ->dateTime(), 
            ])
            ->filters([
                Tables\Filters\Filter::make('name')
                ->query(fn (Builder $query): Builder => $query->whereNotNull('name')),
                // Tables\Filters\Filter::make('category')
                // ->query(fn (Builder $query): Builder => $query->whereNotNull('category_id')),
                
                Tables\Filters\Filter::make('price')
                ->query(fn (Builder $query): Builder => $query->whereNotNull('price')),
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
            CategoriesRelationManager::class
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProducts::route('/create'),
            'edit' => Pages\EditProducts::route('/{record}/edit'),
        ];
    }    
}
