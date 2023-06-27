<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Concert;
use Illuminate\Http\Request;

class ConcertController extends Controller
{
    public function index()
    {
        $data = Concert::paginate(10);

        return view('concert.index', compact('data'));
    }

    public function create()
    {
        return view('concert.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'concert_name' => 'required',
            'place' => 'required',
            'date' => 'required',
            'stock' => 'required',
            'price' => 'required'
        ]);

        Concert::create($validate);

        return redirect()->route('staff.concert.index')->with('success', 'Data berhasil disimpan!');
    }

    public function edit($id)
    {
        $data = Concert::findOrFail($id);

        return view('concert.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Concert::findOrFail($id);

        $validate = $request->validate([
            'concert_name' => 'required',
            'place' => 'required',
            'date' => 'required',
            'stock' => 'required',
            'price' => 'required'
        ]);

        $data->update($validate);

        return redirect()->route('staff.concert.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy($id)
    {
        Concert::findOrFail($id)->delete();

        return back()->with('success', 'Data berhasil dihapus!');
    }
}
