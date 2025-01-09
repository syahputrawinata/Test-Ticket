<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ticketType;

class TicketTypeController extends Controller
{
    //
    public function index()
    {
        $tickettypes = ticketType::all();
        return view('ticket.type', compact('tickettypes'));
    }

    public function createType(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
        ]);

        TicketType::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Tipe Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        //
        $tickettypes = ticketType::find($id);

        return view('edit.type', compact('tickettypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required|min:3',
        ]);

        ticketType::where('id', $id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('ticketType.createType')->with('success', 'Berhasil Mengubah Data!');
    }
}
