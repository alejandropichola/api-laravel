<?php

namespace App\Http\Controllers\Notification;

use Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
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
       //
    }

    public function send(Request $request) {
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $email = $request->input('email');
        $city = $request->input('city');
        $subdivision = $request->input('subdivision');
        $phone = $request->input('phone');
        $description = $request->input('description');
        Mail::send(
            'emails.notification',
            [
                'firstName' => $firstName,
                'lastName' => $lastName,
                'email' => $email,
                'city' => $city,
                'subdivision' => $subdivision,
                'phone' => $phone,
                'description' => $description
            ],
            function ($message) {
                $message->from('website@dicarsa.com.gt', 'Dicarsa');
                $message->to('contacto@dicarsa.com.gt');
            });
        return response()->json(['message' => 'Request completed']);
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
