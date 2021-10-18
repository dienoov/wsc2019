<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SessionController extends Controller
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
        return view('sessions.create', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Event $event)
    {
        $request->validate([
            'type' => 'required',
            'title' => 'required',
            'speaker' => 'required',
            'room_id' => 'required',
            'cost' => 'required',
            'start' => 'required',
            'end' => 'required',
            'description' => 'required',
        ]);

        $input = $request->only('type', 'title', 'speaker', 'room_id', 'cost', 'start', 'end', 'description');

        Session::create($input);

        return redirect()->route('events.show', $event->id)->with('success', 'Success created session');
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
    public function edit(Event $event, Session $session)
    {
        return view('sessions.edit', compact('event', 'session'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event, Session $session)
    {
        $request->validate([
            'type' => 'required',
            'title' => 'required',
            'speaker' => 'required',
            'room_id' => 'required',
            'cost' => 'required',
            'start' => 'required',
            'end' => 'required',
            'description' => 'required',
        ]);

        $input = $request->only('type', 'title', 'speaker', 'room_id', 'cost', 'start', 'end', 'description');

        $session->update($input);

        return redirect()->route('events.show', $event->id)->with('success', 'Success updated session');
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
