<?php


namespace App\Filament\Pages\Auth;


use App\Models\Customer;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use DomainException;
use Filament\Facades\Filament;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Http\Responses\Auth\Contracts\RegistrationResponse;
use Filament\Notifications\Notification;
use Filament\Pages\Auth\Register;

class RefrigerateRegister extends Register
{
    public ?array $data = [];

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nome Completo')
                    ->required()
                    ->maxLength(255),

                TextInput::make('document')
                    ->label('CPF')
                    ->required()
                    ->maxLength(15),

                TextInput::make('email')
                    ->label('Email')
                    ->required()
                    ->email()
                    ->maxLength(255),

                TextInput::make('mobile')
                    ->label('Whatsapp')
                    ->mask('(99) 99999-9999')
                    ->required()
                    ->maxLength(15),

                DatePicker::make('birthdate')
                    ->label('Data de Nascimento')
                    ->displayFormat(function () {
                        return 'd/m/Y';
                    })
                    ->required(),
            ]);
    }

    #[\Override]
    public function register(): ?RegistrationResponse
    {

        try {
            $this->rateLimit(2);

            if (!$this->checkIfCustomerCanRegister()) {
                throw new DomainException('Infelizmente você não pode se registrar no app ' . config('app.name'));
            }

        } catch (TooManyRequestsException $exception) {
            Notification::make()
                ->title(__('filament-panels::pages/auth/register.notifications.throttled.title', [
                    'seconds' => $exception->secondsUntilAvailable,
                    'minutes' => ceil($exception->secondsUntilAvailable / 60),
                ]))
                ->body(array_key_exists('body', __('filament-panels::pages/auth/register.notifications.throttled') ?: []) ? __('filament-panels::pages/auth/register.notifications.throttled.body', [
                    'seconds' => $exception->secondsUntilAvailable,
                    'minutes' => ceil($exception->secondsUntilAvailable / 60),
                ]) : null)
                ->danger()
                ->send();

            return null;
        } catch (DomainException $domainException) {
            Notification::make()
                ->title("Erro ao tentar realizar o cadastro")
                ->body($domainException->getMessage())
                ->warning()
                ->send();

            return null;
        }



        Customer::create($this->data);


        Notification::make()
            ->title("Seu cadastro foi realizado com sucesso!")
            ->body("Enviamos um email para você em {$this->data['email']}, com seus dados de acesso")
            ->success()
            ->send();

        $this->reset();

        return null;
    }

    private function checkIfCustomerCanRegister(): bool
    {
        return now()->parse($this->data['birthdate'])->age >= 18;
//        return (now()->diffInDays($this->data['birthdate']) / 365) >= 18;
    }
}
