<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventDetailResource;
use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Models\Organizer;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('date')->get();
        return response([
            'events' => EventResource::collection($events),
        ]);
    }

    public function detail($organizerSlug, $eventSlug)
    {
        $organizer = Organizer::where('slug', $organizerSlug)->first();

        if (!$organizer)
            return response([
                'message' => 'not found',
            ], 404);

        $event = $organizer->events()->where('slug', $eventSlug)->first();

        if (!$event)
            return response([
                'message' => 'not found',
            ], 404);

        return response(new EventDetailResource($event));
    }
}
