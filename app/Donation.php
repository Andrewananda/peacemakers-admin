<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    public function donation_type() {
        return $this->belongsTo(Donation_type::class);
    }
}
