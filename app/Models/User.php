<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use App\Enums\PanelTypeEnum;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable  implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'panel'             => PanelTypeEnum::class
    ];

    public function canAccessPanel(Panel $panel): bool
    {
//        dd($this->panel, $panel);
        //filament.admin.pages.dashboard
        if($this->panel === PanelTypeEnum::ADMIN){
            return true;
        }

        if($this->panel === PanelTypeEnum::APP){
            return true;
        }

        return false;
    }

    public function customer(): HasOne
    {
        return $this->hasOne(Customer::class);
    }
}
