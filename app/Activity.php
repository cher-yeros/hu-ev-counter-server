<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $guarded = [];
    public function subject() {
        return $this->morphTo();
    }

    public static function addActivity($actor,$subject,$action) {
        // dd($actor? 'uu' : 'actor');
        $result = Activity::create([
            'actor_id' => $actor->id ?? 0,
            'actor_type' => $actor? get_class($actor) : '',
            'action' => $action,
            'subject_id' => $subject->id,
            'subject_type' => get_class($subject),
        ]);
    }

}
