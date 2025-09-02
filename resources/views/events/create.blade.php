<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-green-700">Criar Evento</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto p-6">
        <form method="POST" action="{{ route('admin.events.store') }}"
              class="space-y-6 bg-white p-6 rounded-2xl shadow-md border border-green-100">
            @csrf

            <!-- Nome -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nome do Evento</label>
                <input class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500"
                       name="name" placeholder="Digite o nome do evento" required>
            </div>

            <!-- Data -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Data e Hora</label>
                <input type="datetime-local"
                       class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500"
                       name="date" required>
            </div>

            <!-- Local -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Local</label>
                <input class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500"
                       name="location" placeholder="Digite o local do evento" required>
            </div>

            <!-- Capacidade -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Número máximo de participantes (opcional)</label>
                <input type="number"
                       class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500"
                       name="max_attendees" placeholder="Ex: 100">
            </div>

            <!-- Descrição -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Descrição</label>
                <textarea rows="4"
                          class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500"
                          name="description" placeholder="Adicione uma descrição do evento"></textarea>
            </div>

            <!-- Botão -->
            <div class="flex justify-end">
                <button class="px-6 py-3 rounded-xl bg-green-600 text-white font-semibold shadow hover:bg-green-700 transition">
                    💾 Salvar Evento
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
