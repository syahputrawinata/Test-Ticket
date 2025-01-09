<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;

class TicketProjectController extends Controller
{
    //
    public function index()
    {
        $projects = Projects::all();
        return view('ticket.project', compact('projects'));
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

    public function edit($id)
    {
        //
        $projects = Projects::find($id);

        return view('edit.project', compact('projects'));
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

        Projects::where('id', $id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('project.index')->with('success', 'Berhasil Mengubah Data!');
    }

    public function destroy($id)
    {
        //
        Projects::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil Menghapus Data!');
    }
}
