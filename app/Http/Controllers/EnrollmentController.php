<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    // usuário se inscreve num evento
    public function store(Event $event)
    {
        // trava de lotação
        if ($event->max_attendees && $event->attendees()->count() >= $event->max_attendees) {
            return back()->with('error', 'Evento lotado.');
        }

        // impede duplicidade (unique + syncWithoutDetaching)
        $event->attendees()->syncWithoutDetaching([auth()->id()]);

        return back()->with('success', 'Inscrição confirmada!');
    }

    // usuário cancela a inscrição
    public function destroy(Event $event)
    {
        $event->attendees()->detach(auth()->id());
        return back()->with('success', 'Inscrição cancelada.');
    }

    // área do usuário: em quais eventos está inscrito
    public function myEvents()
    {
        $events = auth()->user()
            ->events()
            ->orderBy('date')
            ->paginate(10);

        return view('events.my', compact('events'));
    }
}
