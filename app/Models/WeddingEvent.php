<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeddingEvent extends Model
{
    protected $fillable = ['event_id', 'bride_good_name', 'groom_good_name'];
}
