<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-green-700 text-center">
            {{ $event->name }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto p-6 space-y-6">
        <!-- Card do evento -->
        <div class="bg-white rounded-2xl shadow-md border border-green-100 p-6 space-y-4">

            <div class="space-y-2 text-gray-700">
                <p><span class="font-semibold">📅 Quando:</span> {{ $event->date->format('d/m/Y H:i') }}</p>
                <p><span class="font-semibold">📍 Onde:</span> {{ $event->location }}</p>
                <p><span class="font-semibold">📝 Descrição:</span> {{ $event->description }}</p>
                <p><span class="font-semibold">👥 Inscritos:</span>
                    {{ $currentCount }}
                    @if($event->max_attendees) / {{ $event->max_attendees }} @endif
                </p>
            </div>

            <!-- Ações de inscrição -->
            <div class="flex flex-wrap gap-3 pt-4 border-t border-gray-200">
                @if($enrolled)
                    <form method="POST" action="{{ route('events.cancel', $event) }}">
                        @csrf @method('DELETE')
                        <button class="px-5 py-2.5 rounded-lg bg-red-600 text-white font-semibold hover:bg-red-700 transition">
                            Cancelar inscrição
                        </button>
                    </form>
                @else
                    <form method="POST" action="{{ route('events.enroll', $event) }}">
                        @csrf
                        <button class="px-5 py-2.5 rounded-lg bg-green-600 text-white font-semibold hover:bg-green-700 transition">
                            Inscrever-se
                        </button>
                    </form>
                @endif

                <!-- Ações do administrador -->
                @if(auth()->user()->is_admin)
                    <a href="{{ route('admin.events.edit', $event) }}"
                       class="px-5 py-2.5 rounded-lg bg-yellow-500 text-white font-semibold hover:bg-yellow-600 transition">
                        Editar
                    </a>

                    <a href="{{ route('admin.events.participants', $event) }}"
                       class="px-5 py-2.5 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700 transition">
                        Ver inscritos
                    </a>

                    <form method="POST" action="{{ route('admin.events.destroy', $event) }}"
                          onsubmit="return confirm('Excluir evento?')">
                        @csrf @method('DELETE')
                        <button class="px-5 py-2.5 rounded-lg bg-red-600 text-white font-semibold hover:bg-red-700 transition">
                            Excluir
                        </button>
                    </form>
                @endif
            </div>
        </div>

        <!-- Mensagens de feedback -->
        @if (session('success'))
            <div class="p-3 rounded-lg bg-green-100 text-green-700 font-medium">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="p-3 rounded-lg bg-red-100 text-red-700 font-medium">
                {{ session('error') }}
            </div>
        @endif
    </div>
</x-app-layout>
