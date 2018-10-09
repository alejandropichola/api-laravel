<?php

namespace App\Http\Controllers\Event;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($siteId)
    {
        $event = Event::toJSONArray(Event::getList($siteId));
        return response()->json([
            'data' => $event,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->input('image');
        $file_name = 'event_' . time() . '.jpg';
        $public_path = storage_path();
        list(, $file) = explode(';', $file);
        list(, $file) = explode(',', $file);
        if ($file != "") {
            \Storage::disk('public')->put($file_name, base64_decode($file));
        }
        $event = new Event();
        $event->site_id = $request->input('site_id');
        $event->image = $file_name;
        $event->description = $request->input('description');
        $event->title = $request->input('title');
        $event->save();

        $response = response()->json([
            "data" => $event->toJSONObject()
        ], 201);
        return json_encode($response, JSON_UNESCAPED_SLASHES);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($eventId)
    {
        $event = Event::getEvent($eventId);
        $nameImg = $event[0] ? $event[0]['image'] : null;
        $public_path = storage_path();
        $url = $public_path . '/app/public/' . $nameImg;
        unlink($url);
        Event::destroy($eventId);
        $response = response()->json([
            "data" => 'ok'
        ], 201);
        return $response;
    }
}
