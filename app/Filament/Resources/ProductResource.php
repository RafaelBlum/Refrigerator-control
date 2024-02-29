<?php

namespace App\Filament\Resources;

use App\Filament\Forms\Components\PtbrMoney;
use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationGroup = "Logística";
    protected static ?string $activeNavigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $modelLabel = "Produto";

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nome do produto')
                    ->required()
                    ->maxLength(255),

                PtbrMoney::make('cost_price')
                    ->label('Preço de Custo')
                    ->required(),

                PtbrMoney::make('sale_price')
                    ->label('Preço de Venda')
                    ->required(),

                Forms\Components\TextInput::make('in_stock')
                    ->label('Estoque atual')
                    ->required()
                    ->numeric()
                    ->disabled()
                    ->default(0),

                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->disableLabel(true)
                    ->required()
                    ->disk('public')
                    ->directory('images')
                    ->columnSpanFull()
                    ->imageEditor()
                    ->circleCropper()
                    ->acceptedFileTypes(['image/png', 'image/jpeg'])
                    ->imageEditorViewportWidth('1920')
                    ->imageEditorViewportHeight('1080')
                    ->downloadable()
                    ->openable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->square()
                    ->defaultImageUrl(url('storage/app/public/thumbnails'))
                    ->size(60)
                    ->label(''),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nome do produto')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cost_price')
                    ->label('Preço de custo')
                    ->formatStateUsing(fn ($state) => number_format($state, 2, ',', '.'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('sale_price')
                    ->label('Preço de venda')
                    ->formatStateUsing(fn ($state) => number_format($state, 2, ',', '.'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('in_stock')
                    ->label('Estoque atual')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
        //
    ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
