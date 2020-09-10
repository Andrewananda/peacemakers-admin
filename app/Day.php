<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    /**
     * @var mixed
     */

    public function sermon() {
        return $this->hasMany(Sermon::class);
    }
    public function fellowship() {
        return $this->hasMany(Fellowship::class);
    }
    public function bulletin() {
        return $this->hasMany(Bulletin::class);
    }
}
