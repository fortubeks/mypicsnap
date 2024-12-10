<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Image;
use App\Models\WeddingEvent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            'user_id' => 1,
            'event_date' => now(),
            'name' => 'FF Wedding',
            'event_type' => 'App/Model/WeddingEvent',
            'eventable_id' => 1
        ]);
        WeddingEvent::create([
            'event_id' => 1,
            'bride_good_name' => 'Favour',
            'groom_good_name' => 'Fortune'
        ]);
        Image::create([
            'event_id' => 1,
            'path' => 'uploads/My5KP0QE05jhT56q2FKoqVd5IloRBiObIKcjycGK.jpg',
            'tag' => 'pre-wedding'
        ]);
        Image::create([
            'event_id' => 1,
            'path' => 'uploads/PbDKWerq88U0acqJ46XWq3Bq4pSDENMAWJNnR1th.jpg',
            'tag' => 'pre-wedding'
        ]);
    }
}
