<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    public function getRouteKeyName(){
        return 'slug';
    }
    public function user() {
        return $this->hasMany(User::class);
    }
}
