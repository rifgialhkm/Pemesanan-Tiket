<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class CheckInController extends Controller
{
    public function index()
    {
        return view('check-in.index');
    }

    public function search(Request $request)
    {
        $q = $request->q;

        $details = Ticket::where('ticket_id', '=', $q)->first();

        if ($details) {
            return view('check-in.index', compact('details'));
        } else {
            return redirect()->route('staff.check-in')->with('message', 'Data tidak ada');
        }
    }

    public function checkIn($id)
    {
        Ticket::findOrFail($id)->update([
            'status' => true
        ]);

        return redirect()->route('staff.check-in')->with('success', 'Berhasil Check In!');
    }
}
