<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation_type extends Model
{
    public function donation() {
        return $this->hasMany(Donation::class);
    }
}
