<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Role;

class User extends Authenticatable {
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','phone'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role() {
        return $this->belongsToMany(Role::class);
    }

    public function campus() {
        return $this->belongsTo(Campus::class);
    }

    public function getAvatarAttribute($avatar) {
        return asset($avatar? : '/images/avatar6.png');
    }
}
