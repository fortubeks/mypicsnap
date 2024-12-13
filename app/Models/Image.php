<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['guest_id', 'event_id', 'path', 'tag'];
}
