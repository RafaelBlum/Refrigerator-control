<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Support\Enums\Alignment;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;



    protected static ?string $navigationGroup = "Carteira de clientes";
    protected static ?string $activeNavigationIcon = 'heroicon-o-wallet';

    protected static ?string $pluralModelLabel = "Clientes";
    protected static ?string $modelLabel = "Cliente";

    protected static ?string $navigationIcon = 'heroicon-o-wallet';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
//                Select::make('user_id')
//                    ->label('Usuário')
//                    ->relationship('user', 'name')->preload()
//                    ->multiple(),

                TextInput::make('name')->label('name')
                    ->required(),

                TextInput::make('email')->label('E-mail')
                    ->required(),

                TextInput::make('document')->label('CPF')
                    ->mask('99.999.999.9-99')
                    ->required(),

//                Select::make('panel')
//                    ->hintIcon('heroicon-m-question-mark-circle', tooltip: 'Selecione o nível de acesso!')
//                    ->hintColor('primary')
//                    ->options([
//                        'admin'       => 'Administrador',
//                        'app'         => 'Usuário',
//                    ])->required(),

                DatePicker::make('birthdate')
                    ->displayFormat(function () {return 'd/m/Y';})
                    ->prefixIcon('heroicon-o-calendar-days')
                    ->prefixIconColor('success'),

                TextInput::make('mobile')->label('celular')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user_count')
                    ->counts('user')
                    ->sortable()
                    ->label('Total clientes')
                    ->alignment(Alignment::Center)
                    ->searchable(),

                TextColumn::make('user.name')
                    ->label('Nome')
                    ->searchable(),

                TextColumn::make('email')
                    ->label('E-mail')
                    ->searchable(),

                TextColumn::make('document')
                    ->label('Documento')
                    ->searchable(),

                TextColumn::make('birthdate')
                    ->label('Data de nascimento')
                    ->date()
                    ->sortable()
                    ->searchable(),


            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
