<?php

namespace Filament\Models;

use Filament\Database\Factories\UserFactory;
use Filament\Models\Concerns\IsFilamentUser;
use Filament\Models\Concerns\SendsFilamentPasswordResetNotification;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory;
    use IsFilamentUser;
    use Notifiable;
    use SendsFilamentPasswordResetNotification;

    public static $filamentAdminColumn = 'is_admin';

    public static $filamentAvatarColumn = 'avatar';

    public static $filamentRolesColumn = 'roles';

    protected $casts = [
        'is_admin' => 'bool',
        'roles' => 'array',
    ];

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $table = 'filament_users';

    protected static function newFactory()
    {
        return UserFactory::new();
    }
}
