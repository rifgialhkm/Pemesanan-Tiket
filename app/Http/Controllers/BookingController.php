<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BookingController extends Controller
{
    public function index()
    {
        $concert = Concert::all();

        return view('booking', compact('concert'));
    }

    public function booking(Request $request)
    {
        $validate = $request->validate([
            'guest_name' => 'required',
            'phone_number' => 'required|between:7,13',
            'email' => 'required|email',
            'address' => 'required',
            'concert_id' => 'required'
        ]);

        $concert = Concert::findOrFail($request->concert_id);

        if ($concert->stock > 0) {
            $data = Ticket::create($validate + [
                'ticket_id' => $this->generateUniqueCode()
            ]);
            
            $concert->decrement('stock', 1);
        } else {
            return back()->with('habis', 'Tiket habis!');
        }

//         $pdf = Pdf::loadView('download.ticket', compact('data'))->setOptions(['defaultFont' => 'sans-serif']);
// ;
//         return $pdf->download('ticket-'.now().'.pdf');

        return back()->with('success', 'Berhasil membeli tiket!');
    }

    public function generateUniqueCode()
    {
        do {
            $code = random_int(1000000000, 9999999999);
        } while (Ticket::where("ticket_id", "=", $code)->first());

        return $code;
    }

    public function getConcertDetails($id)
    {
        $concert = Concert::findOrFail($id);
        $price = 'Rp ' . number_format($concert->price,0,',','.');

        return response()->json([
            'price' => $price,
        ]);
    }
}
