<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:190',
            'date' => 'required|date',
            'location' => 'required|string|max:190',
            'description' => 'nullable|string',
            'max_attendees' => 'nullable|integer|min:1',
        ]);

        $data['created_by'] = auth()->id();

        Event::create($data);
        return redirect()->route('events.index')->with('success', 'Evento criado!');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'name' => 'required|string|max:190',
            'date' => 'required|date',
            'location' => 'required|string|max:190',
            'description' => 'nullable|string',
            'max_attendees' => 'nullable|integer|min:1',
        ]);

        $event->update($data);
        return redirect()->route('events.index')->with('success', 'Evento atualizado!');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Evento excluído!');
    }

    // Lista de inscritos por evento (admin)
    public function participants(Event $event)
    {
        $event->load('attendees');
        return view('admin.events.participants', compact('event'));
    }
}
