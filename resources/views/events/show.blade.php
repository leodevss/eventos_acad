<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-green-700 text-center">
            {{ $event->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <!-- Botão Voltar -->
            <div class="mb-6 text-center">
                <a href="http://127.0.0.1:8000/eventos"
                   class="inline-block px-6 py-3 bg-green-600 text-white font-semibold rounded-lg shadow hover:bg-green-700 transition">
                   ← Voltar para Eventos
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-lg sm:rounded-2xl p-8 border border-green-100">

                <!-- Informações do evento -->
                <div class="space-y-3">
                    <p><span class="font-semibold text-gray-700">📅 Data:</span> {{ $event->date->format('d/m/Y H:i') }}</p>
                    <p><span class="font-semibold text-gray-700">📍 Local:</span> {{ $event->location }}</p>
                    <p><span class="font-semibold text-gray-700">📝 Descrição:</span> {{ $event->description }}</p>
                    <p><span class="font-semibold text-gray-700">👥 Inscritos:</span> {{ $currentCount }} / {{ $event->max_attendees ?? 'Ilimitado' }}</p>
                </div>

                <!-- Ações do admin -->
                @if (auth()->user()->is_admin)
                    <div class="mt-8 border-t pt-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">⚙️ Ações do Administrador</h3>
                        <div class="flex flex-wrap gap-3">
                            <a href="{{ route('admin.events.participants', $event) }}"
                               class="px-4 py-2 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700 transition">
                                Ver Inscritos
                            </a>

                            <a href="{{ route('admin.events.edit', $event) }}"
                               class="px-4 py-2 rounded-lg bg-yellow-500 text-white font-medium hover:bg-yellow-600 transition">
                                Editar Evento
                            </a>

                            <form action="{{ route('admin.events.destroy', $event) }}" method="POST"
                                  onsubmit="return confirm('Tem certeza que deseja excluir este evento?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-4 py-2 rounded-lg bg-red-600 text-white font-medium hover:bg-red-700 transition">
                                    Excluir Evento
                                </button>
                            </form>
                        </div>
                    </div>
                @endif

                <!-- Inscrição / Cancelamento -->
                <div class="mt-8 border-t pt-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">🎟 Participação</h3>
                    @if ($enrolled)
                        <form action="{{ route('events.cancel', $event) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-6 py-3 rounded-lg bg-red-600 text-white font-bold hover:bg-red-700 transition w-full sm:w-auto">
                                Cancelar Inscrição
                            </button>
                        </form>
                    @else
                        <form action="{{ route('events.enroll', $event) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="px-6 py-3 rounded-lg bg-green-600 text-white font-bold hover:bg-green-700 transition w-full sm:w-auto">
                                Inscrever-se
                            </button>
                        </form>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
