<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['user_id', 'event_date', 'name', 'event_type', 'eventable_id'];
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
