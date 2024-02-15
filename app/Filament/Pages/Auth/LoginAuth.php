<?php


namespace App\Filament\Pages\Auth;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\Register;

class LoginAuth extends Register
{
    public function form(Form $form): Form
    {


        return $form
            ->schema([

                TextInput::make('email')
                    ->label('Email')
                    ->required()
                    ->email()
                    ->maxLength(255),

                TextInput::make('password')
                    ->label('password')
                    ->required()
                    ->maxLength(15),
            ]);
    }
}
