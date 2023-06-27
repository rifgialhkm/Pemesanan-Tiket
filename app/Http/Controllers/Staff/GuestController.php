<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Concert;
use App\Models\Ticket;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $data = Ticket::paginate(10);

        return view('guest.index', compact('data'));
    }

    public function edit($id)
    {
        $data = Ticket::findOrFail($id);

        return view('guest.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Ticket::findOrFail($id);

        $validate = $request->validate([
            'guest_name' => 'required',
            'phone_number' => 'required|between:7,13',
            'email' => 'required|email',
            'address' => 'required',
        ]);

        $data->update($validate);

        return redirect()->route('staff.guest.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy($id)
    {
        Ticket::findOrFail($id)->delete();

        return back()->with('success', 'Data berhasil dihapus!');
    }
}
