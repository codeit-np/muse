<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class Tickets extends Controller
{
    public function tickets(Request $request)
    {
        $appointments = Appointment::where('user_id',$request->user_id)->get();
        return response()->json($appointments);
    }
}
