<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AttendeeResource;
use App\Models\Attendee;
use Illuminate\Http\Request;

class AttendeeController extends Controller
{
    public function login(Request $request)
    {
        $attendee = Attendee::where('lastname', $request->lastname)
            ->where('registration_code', $request->registration_code)
            ->first();

        if (!$attendee)
            return response([
                'message' => 'invalid login',
            ], 401);

        $attendee->login_token = md5($attendee->username);
        $attendee->save();

        return response(new AttendeeResource($attendee));
    }

    public function logout(Request $request)
    {
        $attendee = Attendee::where('login_token', $request->token)->first();

        if (!$attendee)
            return response([
                'message' => 'invalid token',
            ], 401);

        $attendee->login_token = '';
        $attendee->save();

        return response([
            'message' => 'logout success',
        ]);
    }
}
