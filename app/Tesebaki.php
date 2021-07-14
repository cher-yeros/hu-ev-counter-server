<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\Tesebaki;

class Tesebaki extends Model
{
    protected $guarded = [];
    protected $with = ['sebaki'];

    public function sebaki() {
        return $this->belongsTo(Sebaki::class);
    }

    public function campus() {
        $this->sebaki->campus;
    }
}
