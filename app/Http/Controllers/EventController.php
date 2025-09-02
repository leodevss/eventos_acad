<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // listagem para usuários logados
    public function index()
    {
        $events = Event::orderBy('date')->paginate(10);
        return view('events.index', compact('events'));
    }

    // detalhe do evento (mostrar botão de inscrever/cancelar)
    public function show(Event $event)
    {
        $enrolled = auth()->user()->events()->where('events.id', $event->id)->exists();
        $currentCount = $event->attendees()->count();
        return view('events.show', compact('event', 'enrolled', 'currentCount'));
    }
}