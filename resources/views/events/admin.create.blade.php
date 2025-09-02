<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-green-700">
            Criar Evento
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-2xl border border-green-100">
                <div class="p-6">
                    <form action="{{ route('admin.events.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Nome -->
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Nome</label>
                            <input type="text" name="name" id="name" required
                                class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        </div>

                        <!-- Data -->
                        <div>
                            <label for="date" class="block text-sm font-semibold text-gray-700 mb-1">Data e Hora</label>
                            <input type="datetime-local" name="date" id="date" required
                                class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        </div>

                        <!-- Local -->
                        <div>
                            <label for="location" class="block text-sm font-semibold text-gray-700 mb-1">Local</label>
                            <input type="text" name="location" id="location" required
                                class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        </div>

                        <!-- Descrição -->
                        <div>
                            <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Descrição</label>
                            <textarea name="description" id="description" rows="4"
                                class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500"></textarea>
                        </div>

                        <!-- Máximo -->
                        <div>
                            <label for="max_attendees" class="block text-sm font-semibold text-gray-700 mb-1">Máximo de Participantes</label>
                            <input type="number" name="max_attendees" id="max_attendees" min="1"
                                class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        </div>

                        <!-- Botões -->
                        <div class="flex justify-between items-center">
                            <!-- Botão Voltar -->
                            <a href="{{ url('/eventos') }}"
                               class="px-6 py-3 rounded-xl bg-gray-200 text-gray-700 font-semibold shadow hover:bg-gray-300 transition">
                                ← Voltar
                            </a>

                            <!-- Botão Criar -->
                            <button type="submit"
                                class="px-6 py-3 rounded-xl bg-green-600 text-white font-semibold shadow hover:bg-green-700 transition">
                                Criar Evento
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
