<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Event $event)
    {
        return view('tickets.create', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Event $event)
    {
        $val = [];
        $json = null;

        if ($request->special_validity === 'amount') {
            $val = ['amount' => 'required'];
            $json = json_encode([
                'type' => 'amount',
                'amount' => $request->amount,
            ]);
        } elseif ($request->special_validity === 'valid_until') {
            $val = ['valid_until' => 'required'];
            $json = json_encode([
                'type' => 'valid_until',
                'valid_until' => $request->valid_until,
            ]);
        }

        $request->validate(array_merge([
            'name' => 'required',
            'cost' => 'required',
        ], $val));

        $input = $request->only('name', 'cost');
        $input['special_validity'] = $json;

        $event->tickets()->save(new Ticket($input));

        return redirect()->route('events.show', $event->id)->with('success', 'Success created ticket');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
