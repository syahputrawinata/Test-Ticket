<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;

class TicketProjectController extends Controller
{
    //
    public function index()
    {
        return view('ticket.project');
    }

    public function createProject(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
        ]);

        Projects::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Tipe Berhasil Ditambahkan!');
    }
}
