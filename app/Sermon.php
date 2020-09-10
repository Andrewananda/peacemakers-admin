<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sermon extends Model
{
    public function day() {
        return $this->belongsTo(Day::class);
    }

}
