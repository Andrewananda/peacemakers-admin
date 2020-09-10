<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fellowship extends Model
{
    public function day() {
        return $this->belongsTo(Day::class);
    }
}
