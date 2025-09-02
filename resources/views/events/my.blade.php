<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-green-700">📌 Meus Eventos</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto p-6 space-y-4">
        @forelse ($events as $event)
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between p-5 rounded-2xl bg-white shadow-md border border-green-100 hover:shadow-lg transition">

                <!-- Informações do evento -->
                <div>
                    <h3 class="text-lg font-bold text-gray-800">
                        <a href="{{ route('events.show', $event) }}" class="hover:text-green-600 transition">
                            {{ $event->name }}
                        </a>
                    </h3>
                    <p class="text-sm text-gray-600 mt-1">
                        📅 {{ $event->date->format('d/m/Y H:i') }} • 📍 {{ $event->location }}
                    </p>
                </div>

                <!-- Cancelar inscrição -->
                <form method="POST" action="{{ route('events.cancel', $event) }}" class="mt-4 sm:mt-0">
                    @csrf @method('DELETE')
                    <button class="px-5 py-2.5 rounded-lg bg-red-600 text-white font-semibold hover:bg-red-700 transition">
                        Cancelar
                    </button>
                </form>
            </div>
        @empty
            <div class="text-center py-12 bg-white shadow rounded-2xl text-gray-500">
                Você ainda não está inscrito em nenhum evento.
            </div>
        @endforelse

        <!-- Paginação -->
        <div class="mt-6">
            {{ $events->links() }}
        </div>
    </div>
</x-app-layout>
