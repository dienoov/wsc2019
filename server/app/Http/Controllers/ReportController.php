<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Event $event)
    {
        $data = [];

        foreach ($event->channels as $channel) {
            foreach ($channel->rooms as $room) {
                foreach ($room->sessions as $session) {
                    $temp = [
                        'session' => $session->title,
                        'capacity' => $room->capacity,
                    ];

                    $temp['attendee'] = $session->type === 'talk' ?
                        $event->registrations->count() :
                        $session->sessionRegistrations->count();

                    $data[] = $temp;
                }
            }
        }

        return view('reports.index', compact('event', 'data'));
    }
}
