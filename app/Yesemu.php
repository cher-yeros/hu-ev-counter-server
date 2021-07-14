<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yesemu extends Model
{
    protected $guarded = [];
    protected $with = ['sebaki'];

    public function sebaki() {
        return $this->belongsTo(Sebaki::class,'sebakiId');
    }

    public function campus() {
        $this->sebaki->campus;
    }
}
