<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\Event;

class AdminEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::latest()->get();
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'nullable|date',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        Event::create($data);

        return redirect()->route('admin.events.index')
                         ->with('success', 'Event berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'nullable|date',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if($request->hasFile('image')){
            // Hapus image lama
            if($event->image){
                Storage::disk('public')->delete($event->image);
            }
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        $event->update($data);

        return redirect()->route('admin.events.index')
                         ->with('success', 'Event berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if($event->image){
            Storage::disk('public')->delete($event->image);
        }

        $event->delete();

        return redirect()->route('admin.events.index')
                         ->with('success', 'Event berhasil dihapus.');
    }
}
