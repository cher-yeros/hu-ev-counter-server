<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sebaki;
use App\Activity;
use App\Campus;
use Auth;

class Sebaki extends Model
{
    // protected static function boot() {
    //     static::created() {
    //         console.log()
    //     }
    // }

    protected $guarded = [];

    protected $with = ['campus'];

    protected $hidden = ['campus_id','password',];

    // public function getRouteKeyName() {
    //     return 'name';
    // }

    public function campus() {
        return $this->belongsTo(Campus::class);
    }

    public function tesebaki() {
        return $this->belongsTo(Sebaki::class);
    }

    public function approve() {
        $this->approved = true;
        $this->save();
        Activity::addActivity(Auth::user(),$this, 'password_updated');
    }

    public function disApprove() {
        $this->approved = false;
        $this->save();
    }

    public function activity() {
        return $this->morphMany(Activity::class,'subject');
    }
}
